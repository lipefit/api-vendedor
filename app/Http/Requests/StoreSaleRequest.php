<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
            'sale_value' => 'required',
            'seller_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sale_value.required' => 'Valor da venda é obrigatório',
            'seller_id.required' => 'Vendedor é obrigatório'
        ];
    }
}
