<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules():array
    {
        return [
          "name"=>"required|string|max:20",
          "email"=>"required|string|email",
          "password"=>"required|string|min:8|max:40|confirmed",
        ];
    }
}
