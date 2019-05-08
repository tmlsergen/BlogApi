<?php

namespace App\Services\Base;

use App\Libraries\Base\Service;
use App\Services\Contacts\PostServiceInterface;

class PostService extends Service implements PostServiceInterface
{
    public function repository()
    {
        return 'App\Repositories\Contacts\PostRepositoryInterface';
    }
}
