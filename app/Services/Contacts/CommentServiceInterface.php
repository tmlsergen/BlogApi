<?php

namespace App\Services\Contacts;

use App\Libraries\Contracts\ServiceInterface;

interface CommentServiceInterface extends ServiceInterface
{
    public function getByPostId($id);
}
