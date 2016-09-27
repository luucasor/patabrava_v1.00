@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Detalhes do produto</h1>
  <label>Referência: </label> {{$produto->referencia}}<br />
  <label>Descrição: </label> {{$produto->descricao}}<br />
  <label>Medida: </label> {{$produto->medida}}<br />
  <label>Peso: </label> {{$produto->peso}}<br />
  <label>Preço Compra: </label> {{$produto->preco_compra}}<br />
  <label>Preço Venda: </label> {{$produto->preco_venda}}<br />
  <label>Quantidade: </label> {{$produto->quantidade}}<br />
  <label>Categoria: </label> {{$produto->categoria->nome}}<br />

  <figure>
    <label>Imagem1: </label> {{$produto->imagem1}}&nbsp
    <img src="\\\{{$produto->imagem1}}">
  </figure>
  <figure>
    <label>Imagem2: </label> {{$produto->imagem2}}&nbsp
  </figure>
  <figure>
    <label>Imagem3: </label> {{$produto->imagem3}}
  </figure>
</div>
@stop
