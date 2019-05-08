<?php

namespace App\Http\Controllers\Api;

use App\Services\Contacts\CommentServiceInterface;
use App\Traits\ApiResponser;
use App\Validator\CommentValidator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    use ApiResponser;

    private $commentService;
    private $commentValidator;

    public function __construct(CommentValidator $commentValidator, CommentServiceInterface $commentService)
    {
        $this->commentService = $commentService;
        $this->commentValidator = $commentValidator;
    }

    public function index()
    {
        return $this->commentService->getData();
    }

    public function store(Request $request)
    {
        $validator = $this->commentValidator->validateComment($request->all());

        if ($validator->fails())
            return $this->errorResponse($validator->messages(), 401);

        return $this->successResponseWithDataKey($this->commentService->setData($request->all()), 200);
    }

    public function update(Request $request, $id)
    {
        $validator = $this->commentValidator->validateComment($request->all());

        if ($validator->fails())
            return $this->errorResponse($validator->messages(), 401);

        return $this->successResponseWithDataKey($this->commentService->updateData($id, $request->all()), 200);
    }

    public function show($id)
    {
        return $this->commentService->getDataById($id);
    }

    public function destroy($id)
    {
        return $this->commentService->deleteData($id);
    }

}
