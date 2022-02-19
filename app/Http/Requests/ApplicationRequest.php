<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            $this->validate([
                'name_animal' => 'required',
                'id_category' => 'required',
                'description' => 'required',
                'photo' => 'required|mimes:jpg, jpeg, bmp, png|max:12400',
                ],['required' => 'Поле :attribute должно быть заполнено'
                ])
        ];
    }
}
