<?php

namespace App\Validator;

class PostValidation
{
    public function savePost($data)
    {
        $valid = [
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required',
        ];

        $validMessage = [
            'title.required' => 'You must HAVE a title!',
            'content.required' => 'You must Have A Content!',
            'user_id.email' => 'You must give a real user_id!',
        ];

        $validator = validator($data, $valid, $validMessage);
        return $validator;
    }
}
