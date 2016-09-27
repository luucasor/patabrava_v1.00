<?php

namespace patabrava\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use patabrava\Produto;
use patabrava\Categoria;
use patabrava\Http\Requests\ProdutoRequest;
use Auth;

class ProdutoController extends Controller {

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function lista(){
    $produtos = Produto::all();
    return view('listagem')->with('produtos', $produtos);
  }

  public function mostra($id){
    $produto = Produto::find($id);
    return view('detalhes')->with('produto', $produto);
  }

  public function novo(){
    return view('formulario')->with('categorias', Categoria::all());
  }

  public function adiciona(ProdutoRequest $request){

    $produto = new Produto();
    $produto->referencia = $request->referencia;
    $produto->descricao = $request->descricao;
    $produto->medida = $request->medida;
    $produto->peso = $request->peso;
    $produto->preco_compra = $request->preco_compra;
    $produto->preco_venda = $request->preco_venda;
    $produto->quantidade = $request->quantidade;
    $produto->categoria_id = $request->categoria_id;
    $produto->imagem1 = $this->upload('imagem1', $request->referencia);
    $produto->imagem2 = $this->upload('imagem2', $request->referencia);
    $produto->imagem3 = $this->upload('imagem3', $request->referencia);

    $produto->push();
    return redirect('/produtos')->withInput($request->except("pass"));
  }

  public function remove($id){
    $produto = Produto::find($id);
    $produto->delete();
    return redirect()->action('ProdutoController@lista');
  }

  private function upload($imagem, $referencia){
    $uploaddir  = "/home/luucasor/patabrava/resources/uploads/";
    $uploadfile = $uploaddir.$referencia.'_'.date("Ymd").'_'.basename($_FILES[$imagem]['name']);
    move_uploaded_file($_FILES[$imagem]['tmp_name'], $uploadfile);

    return $uploadfile;
  }
}
?>
