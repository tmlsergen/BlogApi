<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser;
use App\Validator\AuthValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use ApiResponser;

    private $authValidation;

    public function __construct(AuthValidation $authValidation)
    {
        $this->authValidation = $authValidation;
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

    }

    public function login(Request $request)
    {

    }
}
