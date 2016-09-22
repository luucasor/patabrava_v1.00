<?php

namespace patabrava;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  public function produtos(){
    return $this->hasMany('patabrava\Produto');
  }
}
