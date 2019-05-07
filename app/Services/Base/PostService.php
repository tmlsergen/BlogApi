<?php

namespace App\Services\Base;

use App\Repositories\Contacts\PostRepositoryInterface;
use App\Services\Contacts\PostServiceInterface;

class PostService implements PostServiceInterface
{
    private $postRepository;


    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    // return all data
    public function getPost()
    {
        return $this->postRepository->all();
    }

    // return saved data
    public function setPost($data)
    {
        return $this->postRepository->create($data);
    }

    // return data by id
    public function getById($id)
    {
        return $this->postRepository->find($id);
    }

    // return 1 or 0
    public function deletePost($id)
    {
        return $this->postRepository->delete($id);
    }

    // return 1 or 0
    public function updatePost($id, $data)
    {
        return $this->postRepository->update($data, $id);
    }
}
