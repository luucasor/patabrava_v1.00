<?php

namespace patabrava;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    public $timestamps = false;
    protected $fillable =
        array('referencia', 'descricao', 'medida', 'peso', 'preco_compra', 'preco_venda', 'quantidade',
              'id_categoria', 'imagem1', 'imagem2', 'imagem3');
}
