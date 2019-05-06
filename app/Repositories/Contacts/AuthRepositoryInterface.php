<?php

namespace App\Repositories\Contacts;

interface AuthRepositoryInterface
{
    public function register($data);
    public function login($data);
    public function getUser();
}
