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

  <form role="form" action="/produtos/adiciona" method="post">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 1</label>
            <img src="https://cdn2.iconfinder.com/data/icons/social-media-8/512/image2..png" id="foto1" width="150" height="150">
            <input type="file" id="file1" style="padding-top:2px;" class="filestyle">
            <br />
            <button id="botao1" class="btn btn-default" type="button" onclick="clearFile('file1', 'foto1')">Limpar Imagem</button>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group thumbnail">
          <label>Imagem 2</label>
            <img src="https://cdn2.iconfinder.com/data/icons/social-media-8/512/image2..png" id="foto2" width="150" height="150">
            <input type="file" id="file2">
            <br />
            <button class="btn btn-default" type="button" onclick="clearFile('file2', 'foto2')">Limpar Imagem</button>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group thumbnail">
            <label>Imagem 3</label>
            <img src="https://cdn2.iconfinder.com/data/icons/social-media-8/512/image2..png" id="foto3" width="150" height="150">
            <input type="file" id="file3">
            <br />
            <button class="btn btn-default" type="button" onclick="clearFile('file3', 'foto3')">Limpar Imagem</button>
        </div>
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
            <input name="preco_compra" class="form-control"/>
          </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="form-group">
              <label>Preço Venda</label>
              <input name="preco_venda" class="form-control"/>
          </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" class="form-control"/>
          </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="form-group">
          <label>Categoria</label>
          <select name="categoria_id" class="form-control">
              @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
              @endforeach
          </select>
        </div>
      </div>
    </div>

    <button class="btn btn-primary" type="submit">Adicionar</button>
  </form>

</div>
<script>

function clearFile(idFile, idFoto){
  $("#"+idFile+":file").filestyle('clear');
  $("#"+idFoto).attr('src', 'https://cdn2.iconfinder.com/data/icons/social-media-8/512/image2..png');
}


function readURL(input, id) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#file1").change(function(){
    readURL(this, '#foto1');
}).filestyle({
	buttonName : 'btn-default',
          buttonText : ' Carregar'
});

$("#file2").change(function(){
    readURL(this, '#foto2');
}).filestyle({
  buttonName : 'btn-default',
          buttonText : ' Carregar'
});

$("#file3").change(function(){
    readURL(this, '#foto3');
}).filestyle({
  buttonName : 'btn-default',
          buttonText : ' Carregar'
});
</script>
@stop
