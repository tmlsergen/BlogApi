<?php

namespace App\Services\Contacts;

interface AuthServiceInterface
{
    public function register($data);
    public function login($data);
    public function updateUser($data, $id);
}
