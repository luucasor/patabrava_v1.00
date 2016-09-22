@extends('principal')

@section('conteudo')

@if(count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
<form class="form" action="/produtos/adiciona" method="post">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label>Referência</label>
    <input name="referencia" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Descrição</label>
    <input name="descricao" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Medida</label>
    <input name="medida" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Peso</label>
    <input name="peso" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Preço Compra</label>
    <input name="preco_compra" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Preço Venda</label>
    <input name="preco_venda" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Quantidade</label>
    <input name="quantidade" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Categoria</label>
    <select name="categoria_id" class="form-control">
        @foreach($categorias as $categoria)
          <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
    <label>Imagem1</label>
    <input name="imagem1" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Imagem2</label>
    <input name="imagem2" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Imagem3</label>
    <input name="imagem3" class="form-control"/>
  </div>

  <button class="btn btn-primary" type="submit">Adicionar</button>
</form>

@stop
