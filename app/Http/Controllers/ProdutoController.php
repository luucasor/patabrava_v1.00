<?php

namespace patabrava\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use patabrava\Produto;

class ProdutoController extends Controller {

  public function lista(){
    $produtos = Produto::all();
    return view('listagem')->with('produtos', $produtos);
  }

  public function mostra(){
    $id = Request::route('id');
    $produto = Produto::find($id);
    return view('detalhes')->with('produto', $produto);
  }

  public function novo(){
    return view('formulario');
  }

  public function adiciona(){
    $referencia = Request::input('referencia');
    $descricao = Request::input('descricao');
    $medida = Request::input('medida');
    $peso = Request::input('peso');
    $preco_compra = Request::input('preco_compra');
    $preco_venda = Request::input('preco_venda');
    $quantidade = Request::input('quantidade');
    $categoria = Request::input('categoria');
    $imagem1 = Request::input('imagem1');
    $imagem2 = Request::input('imagem2');
    $imagem3 = Request::input('imagem3');

    DB::insert("INSERT INTO produto(referencia, descricao, medida, peso, preco_compra,
                                    preco_venda, quantidade, id_categoria, imagem1, imagem2, imagem3)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)", array($referencia, $descricao, $medida, $peso, $preco_compra,
                                    $preco_venda, $quantidade, $categoria, $imagem1, $imagem2, $imagem3));

    return redirect('/produtos')->withInput();
  }
}
?>
