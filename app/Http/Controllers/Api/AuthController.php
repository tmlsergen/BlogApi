<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Contacts\AuthRepositoryInterface;
use App\Traits\ApiResponser;
use App\Validator\AuthValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use ApiResponser;

    private $authValidation;
    private $authRepository;

    public function __construct(AuthValidation $authValidation, AuthRepositoryInterface $authRepository)
    {
        $this->authValidation = $authValidation;
        $this->authRepository = $authRepository;

    }

    public function register(Request $request)
    {
        $validator = $this->authValidation->register($request->all());

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 401);
        }

        $data = $request->all();

        $input = [
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => bcrypt($data['password'])
        ];

        $response = $this->authRepository->register($input);

        return $this->successResponse($response, 200);

    }

    public function login(Request $request)
    {
        $data = $request->all();

        $validator = $this->authValidation->login($request->all());

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 401);
        }

        $authResponse = $this->authRepository->login($data);

        if ($authResponse === 'Unauthorised') {
            return $this->errorResponse("Unauthorised", 401);
        } else {
            return $this->successResponseWithDataKey($authResponse, 200);
        }
    }
}
