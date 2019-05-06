<?php

namespace App\Repositories\Contacts;

interface AuthRepositoryInterface
{
    public function getUser();
    public function createUser($data);
    public function attemptUser($data);
}
