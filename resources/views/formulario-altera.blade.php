@extends('layouts.app')

@section('content')
@if(count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif

<div class="container">

  <form enctype="multipart/form-data" action="/produtos/atualiza" method="post">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{$produto->id}}">
    <input type="hidden" name="referencia" value="{{$produto->referencia}}">
    <input type="hidden" name="tipo" value="alterado">

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 1</label>
          <figure align="center">
            <img class="img-rounded" name="img1" id="img1" src="/uploads/{{$produto->imagem1}}" height="150" width="200" alt="Prévia da imagem1...">
            <button id="botao1" class="btn btn-default" type="button" onclick="clearFile('imagem1', 'img1')">Limpar Imagem</button>
          </figure>
        </div>
          <input name="imagem1" id="imagem1" type="file" onchange="previewFile('#img1', '#imagem1')" value="{{$produto->imagem1}}"><br>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 2</label>
          <figure align="center">
            <img class="img-rounded" name="img2" id="img2" src="/uploads/{{$produto->imagem2}}" height="150" width="200" alt="Prévia da imagem2...">
            <button id="botao2" class="btn btn-default" type="button" onclick="clearFile('imagem2', 'img2')">Limpar Imagem</button>
          </figure>
        </div>
        <input name="imagem2" id="imagem2" type="file" onchange="previewFile('#img2', '#imagem2')"><br>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 3</label>
          <figure align="center">
            <img class="img-rounded" name="img3" id="img3" src="/uploads/{{$produto->imagem3}}" height="150" width="200" alt="Prévia da imagem3...">
            <button id="botao3" class="btn btn-default" type="button" onclick="clearFile('imagem3', 'img3')">Limpar Imagem</button>
          </figure>
        </div>
        <input name="imagem3" id="imagem3" type="file" onchange="previewFile('#img3', '#imagem3')"><br>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group">
          <label>Referência</label>
          <input type="text" class="form-control input-md" tabindex="1" value="{{$produto->referencia}}" disabled="disabled">
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group">
          <label>Medida</label>
          <input type="text" name="medida" id="medida" class="form-control input-md" tabindex="2" value="{{$produto->medida}}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group">
          <label>Peso</label>
          <input type="text" name="peso" id="peso" class="form-control input-md" tabindex="3" value="{{$produto->peso}}">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
          <label>Descrição</label>
          <input type="text" name="descricao" id="descricao" class="form-control input-md" tabindex="4" value="{{$produto->descricao}}">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="form-group">
            <label>Preço Compra</label>
            <input name="preco_compra" class="form-control" tabindex="5" value="{{$produto->preco_compra}}">
          </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="form-group">
              <label>Preço Venda</label>
              <input name="preco_venda" class="form-control" tabindex="6" value="{{$produto->preco_venda}}">
          </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" class="form-control" tabindex="7" value="{{$produto->quantidade}}">
          </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="form-group">
          <label>Categoria</label>
          <select name="categoria_id" class="form-control" tabindex="8">
              @foreach($categorias as $categoria)
                <option value="{{$produto->categoria_id}}">{{$produto->categoria->nome}}</option>
              @endforeach
          </select>
        </div>
      </div>
    </div>

      <button style="width: 10%;" class="btn btn-md btn-default" type="button" tabindex="9" onclick="voltar();">Voltar</button>&nbsp&nbsp
      <button style="width: 10%;" class="btn btn-md btn-primary" type="submit" tabindex="10">Alterar</button>
  </form>

</div>
<script>

function voltar(){
  document.location = "/produtos";
}

function clearFile(idFile, idFoto){
  $('#'+idFoto).attr('src', 'https://cdn2.iconfinder.com/data/icons/social-media-8/512/image2..png');
  document.getElementById(idFile).value = "";

}

function previewFile(idImg, idFile) {
  var preview = document.querySelector(idImg);
  var file    = document.querySelector(idFile).files[0];
  var reader  = new FileReader();

  reader.onloadend = function() {
    preview.src = reader.result;
  }

  reader.readAsDataURL(file);
}
</script>
@stop