<?php

namespace App\Libraries\Base;

use App\Libraries\Contracts\RepositoryInterface as Repository;

abstract class Criteria {

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @param $parameters = null
     * @return mixed
     */
    public abstract function apply($model, Repository $repository);
}
