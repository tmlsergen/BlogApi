<?php

namespace App\Services\Base;

use App\Repositories\Contacts\CommentRepositoryInterface;
use App\Services\Contacts\CommentServiceInterface;

class CommentService implements CommentServiceInterface
{

    private $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    // return all data
    public function getData()
    {
        return $this->commentRepository->all();
    }

    // return stored data
    public function setData($data)
    {
        return $this->commentRepository->create($data);
    }

    // return data filter by id
    public function getDataById($id)
    {
        return $this->commentRepository->find($id);
    }

    // return 1 or 0
    public function deleteData($id)
    {
        return $this->commentRepository->delete($id);
    }

    // return 1 or 0
    public function updateData($id, $data)
    {
        return $this->commentRepository->update($data, $id);
    }
}
