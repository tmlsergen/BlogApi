<?php

namespace App\Http\Controllers\Api;

use App\Services\Contacts\PostServiceInterface;
use App\Traits\ApiResponser;
use App\Validator\PostValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    use ApiResponser;

    private $postValidator;
    private $postService;

    public function __construct(PostValidation $postValidator, PostServiceInterface $postService)
    {
        $this->postValidator = $postValidator;
        $this->postService = $postService;
    }

    public function index()
    {
        return $this->postService->getPost();
    }

    public function show($id)
    {
        return $this->postService->getById($id);
    }

    public function store(Request $request)
    {
        $validator = $this->postValidator->savePost($request->all());
        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 401);
        }

        return $this->successResponse($this->postService->setPost($request->all()), 200);
    }

    public function update(Request $request, $id)
    {
        $validator = $this->postValidator->savePost($request->all());
        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 401);
        }

        return $this->successResponse($this->postService->updatePost($id, $request->all()), 200);
    }

    public function destroy($id)
    {
        return $this->postService->deletePost($id);
    }
}
