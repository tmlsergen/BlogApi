<?php

namespace App\Validator;

class AuthValidation
{
    public function register($data)
    {
        $valid = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];

        $validMessage = [
            'name.required' => 'You must HAVE a name!',
            'email.required' => 'You must Have A E-Mail!',
            'email.email' => 'You must give a real e-mail!',
            'password.required' => 'You must Have a password!',
            'c_password.required' => 'You must give as re_pass',
            'c_password.same:password' => 'Passwords must be same !!! !!! '
        ];

        $validator = validator($data, $valid, $validMessage);

        return $validator;
    }

    public function login($data)
    {
        $valid = [
            'email' => 'required',
            'password' => 'required'
        ];

        $validMessage = [
            'email.required' => 'You must give as email for login.',
            'password.required' => 'You must give as password'
        ];

        $validator = validator($data, $valid, $validMessage);

        return $validator;
    }

    public function updateNameEmail($data)
    {
        $valid = [
            'email' => 'required',
            'name' => 'required'
        ];

        $validMessage = [
            'email.required' => 'You must give as email for login.',
            'name.required' => 'You must give as name'
        ];

        $validator = validator($data, $valid, $validMessage);

        return $validator;
    }

    public function updatePassword($data)
    {
        $valid = [
            'password' => 'required',
            'c_password' => 'required'
        ];

        $validMessage = [
            'password.required' => 'You must give as password.',
            'c_password.required' => 'You must give as re password'
        ];

        $validator = validator($data, $valid, $validMessage);

        return $validator;
    }
}
