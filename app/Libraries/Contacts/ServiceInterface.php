<?php

namespace App\Libraries\Contracts;

interface ServiceInterface
{
    public function getData();
    public function setData($data);
    public function getDataById($id);
    public function deleteData($id);
    public function updateData($id, $data);
}
