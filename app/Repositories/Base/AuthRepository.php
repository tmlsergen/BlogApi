<?php

namespace App\Repositories\Base;

use App\Repositories\Contacts\AuthRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{

    public function attemptUser($data)
    {
        return Auth::attempt($data);
    }

    public function createUser($data)
    {
        return User::create($data);
    }

    public function getUser()
    {
        return Auth::user();
    }

    public function updateUser($data, $id)
    {
        return User::where('id', $id)->update($data);
    }
}
