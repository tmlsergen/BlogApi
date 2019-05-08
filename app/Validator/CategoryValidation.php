<?php

namespace App\Validator;

class CategoryValidation
{
    public function save($data)
    {
        $valid = [
            'name' => 'required',
        ];

        $validMessage = [
            'name.required' => 'You must give category name !',
        ];

        $validator = validator($data, $valid, $validMessage);
        return $validator;
    }
}
