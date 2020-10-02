<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialOfferRequest extends FormRequest
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
        $todayDate = date('Y/m/d');

        return [
            'offer' => 'required|min:3|max:255',
            'discount' => 'required|numeric',
            'expiry' => 'required|date|after_or_equal:'.$todayDate
        ];
    }
}
