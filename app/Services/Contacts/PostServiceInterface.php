<?php

namespace App\Services\Contacts;

use App\Libraries\Contracts\ServiceInterface;

interface PostServiceInterface extends ServiceInterface
{
    public function getByCategory($id);
}
