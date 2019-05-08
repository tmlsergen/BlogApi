<?php

namespace App\Http\Controllers\Api;

use App\Services\Contacts\CategoryServiceInterface;
use App\Traits\ApiResponser;
use App\Validator\CategoryValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    use ApiResponser;
    private $categoryValidator;
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService, CategoryValidation $categoryValidator)
    {
        $this->categoryService = $categoryService;
        $this->categoryValidator = $categoryValidator;
    }

    public function index()
    {
        return $this->categoryService->getData();
    }

    public function show($id)
    {
        return $this->categoryService->getDataById($id);
    }

    public function store(Request $request)
    {
        $validator = $this->categoryValidator->save($request->all());

        if ($validator->fails())
            return $this->errorResponse($validator->messages(), 401);

        return $this->successResponse($this->categoryService->setData($request->all()), 200);
    }

    public function update(Request $request, $id)
    {
        $validator = $this->categoryValidator->save($request->all());

        if ($validator->fails())
            return $this->errorResponse($validator->messages(), 401);

        return $this->successResponse($this->categoryService->updateData($id,$request->all()), 200);
    }

    public function destroy($id)
    {
        return $this->categoryService->deleteData($id);
    }
}
