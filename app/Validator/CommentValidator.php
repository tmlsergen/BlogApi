<?php

namespace App\Validator;


class CommentValidator
{
    public function validateComment($data)
    {
        $valid = [
            'user_id' => 'required',
            'post_id' => 'required',
            'content' => 'required',
        ];

        $validMessage = [
            'post_id.required' => 'You must give the base post !',
            'content.required' => 'You must Have A Content !',
            'user_id.email' => 'You must give a real user !',
        ];

        $validator = validator($data, $valid, $validMessage);
        return $validator;
    }
}
