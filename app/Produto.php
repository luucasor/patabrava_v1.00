<?php

namespace patabrava;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    public $timestamps = false;
    protected $fillable =
        array('referencia', 'descricao', 'medida', 'peso', 'preco_compra', 'preco_venda', 'quantidade',
              'categoria_id', 'imagem1', 'imagem2', 'imagem3');

    public function categoria(){
      return $this->belongsTo('patabrava\Categoria');
    }
}
