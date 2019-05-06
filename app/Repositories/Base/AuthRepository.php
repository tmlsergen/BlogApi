<?php

namespace App\Repositories\Base;

use App\Repositories\Contacts\AuthRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{

    public function register($data)
    {
        try {
            $user = User::create($data);
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
        if (Auth::attempt($data)) {
            $user = Auth::user();
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

    public function getUser()
    {
        $user = Auth::user();
        return $user;
    }
}
