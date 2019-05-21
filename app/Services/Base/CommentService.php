<?php

namespace App\Services\Base;

use App\Libraries\Base\Service;
use App\Services\Contacts\CommentServiceInterface;

class CommentService extends Service implements CommentServiceInterface
{
    public function repository()
    {
        return 'App\Repositories\Contacts\CommentRepositoryInterface';
    }

    public function getByPostId($id)
    {
        return $this->repositoryParam->findAllBy('post_id', $id);
    }

}
