<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatusRequest extends FormRequest
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
            'status' => 'required|in:Решена,Отклонена',
            'new_img' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg,webp','max:10000', Rule::requiredIf(function (){
                return ($this->status == 'Решена');
            })],
            'cause' => ['nullable','string', Rule::requiredIf(function (){
                return ($this->status == 'Отклонена');
            })]
        ];
    }
}
