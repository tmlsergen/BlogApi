<?php

namespace App\Repositories\Base;

use App\Libraries\Base\Repository;
use App\Repositories\Contacts\CategoryRepositoryInterface;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{
    public function model()
    {
        return 'App\Models\Category';
    }
}
