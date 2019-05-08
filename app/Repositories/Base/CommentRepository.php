<?php

namespace App\Repositories\Base;

use App\Libraries\Base\Repository;
use App\Repositories\Contacts\CommentRepositoryInterface;

class CommentRepository extends Repository implements CommentRepositoryInterface
{
    public function model()
    {
        return 'App/Models/Comment';
    }
}
