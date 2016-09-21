<?php

namespace patabrava\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'referencia'  => 'required|min:4',
            'descricao'   => 'required|max:300',
            'preco_compra'=> 'required|numeric',
            'preco_venda' => 'required|numeric',
            'quantidade'  => 'required|numeric'
        ];
    }

    public function messages(){
      return [
        'required' => "O campo ':attribute' é obrigatório",
        'numeric'  => "O campo ':attribute' deve ser numérico"
      ];
    }
}
