<?php

namespace App\Services\Base;

use App\Libraries\Base\Service;
use App\Services\Contacts\CategoryServiceInterface;

class CategoryService extends Service implements CategoryServiceInterface
{
    public function repository()
    {
        return 'App\Repositories\Contacts\CategoryRepositoryInterface';
    }
}
