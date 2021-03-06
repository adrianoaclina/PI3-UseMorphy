<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProdutoRequest extends FormRequest
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
            'nome' => 'required|unique:produtos|max:255',
            'imagem' => 'required|image',
            'descricao' => 'required',
            'preco' => 'required',
            'desconto' => 'required',
            'estoque' => 'required',
            'categoria_id' => 'required'
            
        ];
    }
}
