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

  <label>Imagem1: </label> {{$produto->categoria->imagem1}}&nbsp
  <label>Imagem2: </label> {{$produto->categoria->imagem2}}&nbsp
  <label>Imagem3: </label> {{$produto->categoria->imagem3}}
</div>
@stop
