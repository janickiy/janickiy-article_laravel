<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => 'required|min:6',
            'body' => 'required|min:10',
            'article_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => "Это поле обязательно для заполнения",
            'subject.min' => "Это поле должно быть длиннее :min символов",
            'body.required' => "Это поле обязательно для заполнения",
            'body.min' => "Это поле должно быть длиннее :min символов",
        ];
    }
}
