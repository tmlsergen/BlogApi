<?php

namespace App\Services\Contacts;

interface PostServiceInterface
{
    public function getPost();
    public function setPost($data);
    public function getById($id);
    public function deletePost($id);
    public function updatePost($id, $data);
}
