<?php

namespace App\Libraries\Base;

use Illuminate\Container\Container as App;
use App\Libraries\Contracts\ServiceInterface;

abstract class Service implements ServiceInterface
{
    protected $repositoryParam;
    protected $app;
    public abstract function repository();

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeRepository();
    }

    public function makeRepository()
    {
        return $this->setRepository($this->repository());
    }

    public function setRepository($repository)
    {
        $this->newModel = $this->app->make($repository);
        $this->repositoryParam = $this->newModel;
    }



    public function getData()
    {
        return $this->repositoryParam->all();
    }

    public function getDataById($id)
    {
        return $this->repositoryParam->find($id);
    }

    public function setData($data)
    {
        return $this->repositoryParam->create($data);
    }

    public function updateData($id, $data)
    {
        return $this->repositoryParam->update($data, $id);
    }

    public function deleteData($id)
    {
        return $this->repositoryParam->delete($id);
    }

}
