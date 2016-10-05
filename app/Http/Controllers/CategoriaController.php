<?php

namespace patabrava\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use patabrava\Produto;
use patabrava\Categoria;
use patabrava\Http\Requests\ProdutoRequest;
use Auth;

class CategoriaController extends Controller {

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function lista(){
    $categorias = Categoria::all();
    return view('categorias')->with('categorias', $categorias);
  }

  public function altera($id){
    $categorias = Categoria::find($id);
    return view('formulario-altera-categoria')->with('categoria', $categoria));
  }

  public function nova(){
    return view('formulario-categoria'));
  }

  public function adiciona(CategoriaRequest $request){

    $categoria = new Categoria();
    $categoria->nome = $request->nome;
    $categoria->push();

    return redirect('/produtos/categoria')->withInput($request->except("pass"));
  }

  public function atualiza(ProdutoRequest $request){
    $produto = Produto::find($request->id);
    $produto->referencia = $request->referencia;
    $produto->descricao = $request->descricao;
    $produto->medida = $request->medida;
    $produto->peso = $request->peso;
    $produto->preco_compra = $request->preco_compra;
    $produto->preco_venda = $request->preco_venda;
    $produto->quantidade = $request->quantidade;
    $produto->categoria_id = $request->categoria_id;

    if(isset($request->imagem1))
      $produto->imagem1 = $this->upload('imagem1', $request->referencia);

    if(isset($request->imagem2))
      $produto->imagem2 = $this->upload('imagem2', $request->referencia);

    if(isset($request->imagem3))
      $produto->imagem3 = $this->upload('imagem3', $request->referencia);

    $produto->push();
    return redirect('/produtos')->withInput($request->except("pass"));
  }

  public function remove($id){
    $produto = Produto::find($id);
    $produto->delete();
    return redirect()->action('ProdutoController@lista');
  }
}
?>
