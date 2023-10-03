<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
        return
        [
            'name'      => 'required|max:100|unique:offers,name',
            'price'     => 'required|numeric',
            'details'   => 'required'
        ];
    }

    /**
     * Display the validation MESSAGES that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return
        [
            'name.require'      => __('message.offerNameReq'),
            'name.length'       => __('message.offerNameLen'),
            'name.unique'       => __('message.offerNameUniq'),
            'price.required'    => __('message.offerPriceReq'),
            'price.numeric'     => __('message.offerPriceNum'),
            'details.required'  => __('message.offerDetailsReq'),
        ];
    }
}
