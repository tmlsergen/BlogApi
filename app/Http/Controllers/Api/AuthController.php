<?php

namespace App\Http\Controllers\Api;

use App\Services\Contacts\AuthServiceInterface;
use App\Traits\ApiResponser;
use App\Validator\AuthValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use ApiResponser;

    private $authValidation;
    private $authService;

    public function __construct(AuthValidation $authValidation, AuthServiceInterface $authService)
    {
        $this->authValidation = $authValidation;
        $this->authService = $authService;

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

        $response = $this->authService->register($input);

        return $this->successResponse($response, 200);

    }

    public function login(Request $request)
    {
        $data = $request->all();

        $validator = $this->authValidation->login($request->all());

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 401);
        }

        $authResponse = $this->authService->login($data);

        if ($authResponse === 'Unauthorised') {
            return $this->errorResponse("Unauthorised", 401);
        } else {
            return $this->successResponse($authResponse, 200);
        }
    }
}
