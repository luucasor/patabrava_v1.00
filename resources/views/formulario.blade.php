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

  <form enctype="multipart/form-data" action="/produtos/adiciona" method="post">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 1</label>
          <figure align="center">
            <img name="img1" id="img1" src="https://cdn2.iconfinder.com/data/icons/social-media-8/512/image2..png" height="150" width="200" alt="Prévia da imagem1...">
            <button id="botao1" class="btn btn-default" type="button" onclick="clearFile('imagem1', 'img1')">Limpar Imagem</button>
          </figure>
        </div>
          <input name="imagem1" id="imagem1" type="file" onchange="previewFile('#img1', '#imagem1')"><br>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 2</label>
          <figure align="center">
            <img name="img2" id="img2" src="https://cdn2.iconfinder.com/data/icons/social-media-8/512/image2..png" height="150" width="200" alt="Prévia da imagem2...">
            <button id="botao2" class="btn btn-default" type="button" onclick="clearFile('imagem2', 'img2')">Limpar Imagem</button>
          </figure>
        </div>
        <input name="imagem2" id="imagem2" type="file" onchange="previewFile('#img2', '#imagem2')"><br>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 3</label>
          <figure align="center">
            <img name="img3" id="img3" src="https://cdn2.iconfinder.com/data/icons/social-media-8/512/image2..png" height="150" width="200" alt="Prévia da imagem3...">
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
          <input type="text" name="referencia" id="referencia" class="form-control input-md" tabindex="1">
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group">
          <label>Medida</label>
          <input type="text" name="medida" id="medida" class="form-control input-md" tabindex="2">
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group">
          <label>Peso</label>
          <input type="text" name="peso" id="peso" class="form-control input-md" tabindex="3">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
          <label>Descrição</label>
          <input type="text" name="descricao" id="descricao" class="form-control input-md" tabindex="4">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="form-group">
            <label>Preço Compra</label>
            <input name="preco_compra" class="form-control" tabindex="5"/>
          </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="form-group">
              <label>Preço Venda</label>
              <input name="preco_venda" class="form-control" tabindex="6"/>
          </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" class="form-control" tabindex="7"/>
          </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="form-group">
          <label>Categoria</label>
          <select name="categoria_id" class="form-control" tabindex="8">
              @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
              @endforeach
          </select>
        </div>
      </div>
    </div>

    <button class="btn btn-primary" type="submit" tabindex="9">Adicionar</button>
  </form>

</div>
<script>

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
