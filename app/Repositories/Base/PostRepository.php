<?php

namespace App\Repositories\Base;

use App\Libraries\Base\Repository;
use App\Repositories\Contacts\PostRepositoryInterface;

class PostRepository extends Repository implements PostRepositoryInterface
{
    public function model()
    {
        return 'App\Models\Post';
    }
}
