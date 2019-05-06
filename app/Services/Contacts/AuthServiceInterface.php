<?php

namespace App\Services\Contacts;

interface AuthServiceInterface
{
    public function register($data);
    public function login($data);
}
