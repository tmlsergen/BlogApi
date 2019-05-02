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

    }

    public function login(Request $request)
    {

    }
}
