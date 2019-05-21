<?php

namespace App\Services\Base;

use App\Repositories\Contacts\AuthRepositoryInterface;
use App\Services\Contacts\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
    private $authRepositroy;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepositroy = $authRepository;
    }

    public function register($data)
    {
        try {
            $user = $this->authRepositroy->createUser($data);
            $userToken = $user->createToken('AppName')->accessToken;

            $response = [
                $user,
                $userToken
            ];
            return $response;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function login($data)
    {
        if ($this->authRepositroy->attemptUser($data)) {
            $user = $this->authRepositroy->getUser();
            $userToken = $user->createToken('AppName')->accessToken;
            $response = [
                $user,
                $userToken
            ];
            return $response;
        }else{
            return 'Unauthorised';
        }
    }

    public function updateUser($data, $id)
    {
        return $this->authRepositroy->updateUser($data, $id);
    }
}
