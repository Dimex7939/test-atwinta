<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните название',
            'paste.required' => 'Заполните текст "Пасты"',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'paste' => 'required',
            'exp_time' => 'integer',
            'access' => 'integer',
            'name' => 'nullable|max:255',
            'anon' => 'nullable',

        ];
    }
}
