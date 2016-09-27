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

  public function altera($id){
    $produto = Produto::find($id);
    return view('formulario-altera')->with('produto', $produto)->with('categorias', Categoria::all());
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

  private function upload($imagem, $referencia){
    $uploadDir  = "/home/luucasor/patabrava/public/uploads/";
    $nameImage  = $referencia.'_'.date("Ymd").'_'.basename($_FILES[$imagem]['name']);
    $uploadFile = $uploadDir.$nameImage;
    move_uploaded_file($_FILES[$imagem]['tmp_name'], $uploadFile);

    return $nameImage;
  }
}
?>
