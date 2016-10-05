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

<div class="page-header text-left path">
  <h4><b>Edição</b></h4>
  <ul class="nav nav-tabs">
      <li class="active"><a href="#info-tab" class="tablinks" data-toggle="tab" onclick="openCity(event, 'geral')">Geral <i class="fa"></i></a></li>
      <li><a href="#address-tab" class="tablinks" data-toggle="tab" onclick="openCity(event, 'imagens')">Imagens <i class="fa"></i></a></li>
  </ul>
</div>

<form enctype="multipart/form-data" action="/produtos/atualiza" method="post">

  <div id="geral" class="container tabcontent" style="padding-left:30px; padding-right:30px; padding-top:50px;">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="id" value="{{$produto->id}}">
      <input type="hidden" name="referencia" value="{{$produto->referencia}}">
      <input type="hidden" name="tipo" value="alterado">

      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-2 col-md-offset-3">
          <div class="form-group">
            <label>Referência</label>
            <input type="text" class="form-control input-md" tabindex="1" value="{{$produto->referencia}}" disabled="disabled">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-2">
          <div class="form-group">
            <label>Medida</label>
            <input type="text" name="medida" id="medida" class="form-control input-md" tabindex="2" value="{{$produto->medida}}">
          </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-2">
          <div class="form-group">
            <label>Peso</label>
            <input type="text" name="peso" id="peso" class="form-control input-md" tabindex="3" value="{{$produto->peso}}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
          <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control input-md" tabindex="4" value="{{$produto->descricao}}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-3 col-md-offset-3">
            <div class="form-group">
              <label>Preço Compra</label>
              <input name="preco_compra" class="form-control" tabindex="5" value="{{$produto->preco_compra}}">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group">
                <label>Preço Venda</label>
                <input name="preco_venda" class="form-control" tabindex="6" value="{{$produto->preco_venda}}">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-md-offset-3">
            <div class="form-group">
              <label>Quantidade</label>
              <input name="quantidade" class="form-control" tabindex="7" value="{{$produto->quantidade}}">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
          <div class="form-group">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" tabindex="8">
                @foreach($categorias as $categoria)
                  <option value="{{$produto->categoria_id}}">{{$produto->categoria->nome}}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div id="botoes" class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3" style="padding-top:10px;">
          <button type="button" class="btn btn-default col-xs-5 col-sm-5 col-md-4" tabindex="10" onclick="voltar();">Cancelar</button>
          <span class="col-xs-2 col-sm-2 col-md-4"></span>
          <button type="submit" class="btn btn-primary col-xs-5 col-sm-5 col-md-4" tabindex="9"><span class="glyphicon glyphicon-pencil"></span>  Editar</button>
        </div>
      </div>
  </div>

  <div id="imagens" class="container tabcontent" style="display:none; padding-left:30px; padding-right:30px; padding-top:40px;">
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 1</label>
          <figure align="center">
            <img class="img-rounded imagem" name="img1" id="img1" src="/uploads/{{$produto->imagem1}}" alt="Prévia da imagem1...">
          </figure>
        </div>
        <button id="botao1" class="btn btn-default" type="button" onclick="clearFile('imagem1', 'img1')">Limpar Imagem</button>
        <input name="imagem1" id="imagem1" type="file" onchange="previewFile('#img1', '#imagem1')" value="{{$produto->imagem1}}"><br>
      </div>

      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 2</label>
          <figure align="center">
            <img class="img-rounded imagem" name="img2" id="img2" src="/uploads/{{$produto->imagem2}}" alt="Prévia da imagem2...">
            <button id="botao2" class="btn btn-default" type="button" onclick="clearFile('imagem2', 'img2')">Limpar Imagem</button>
          </figure>
        </div>
        <input name="imagem2" id="imagem2" type="file" onchange="previewFile('#img2', '#imagem2')"><br>
      </div>

      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 3</label>
          <figure align="center">
            <img class="img-rounded imagem" name="img3" id="img3" src="/uploads/{{$produto->imagem3}}" alt="Prévia da imagem3...">
            <button id="botao3" class="btn btn-default" type="button" onclick="clearFile('imagem3', 'img3')">Limpar Imagem</button>
          </figure>
        </div>
        <input name="imagem3" id="imagem3" type="file" onchange="previewFile('#img3', '#imagem3')"><br>
      </div>
    </div>
  </div>

</form>

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

function openCity(evt, divId) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(divId).style.display = "block";
    evt.currentTarget.className += " active";
}

</script>
@stop
