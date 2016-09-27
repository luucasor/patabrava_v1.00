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

    <table>
      <tr>
        <td>
          <div class="thumbnail">
            <figure>
              <label>Imagem1: </label> {{$produto->imagem1}} <br />
              <img class="img-rounded" src="/uploads/{{$produto->imagem1}}" width="150" height="150"></img>
            </figure>
          </div>
        </td>
        <td>
          <div class="thumbnail">
            <figure>
              <label>Imagem2: </label> {{$produto->imagem2}} <br />
              <img class="img-rounded" src="/uploads/{{$produto->imagem2}}" width="150" height="150"></img>
            </figure>
          </div>
        </td>
        <td>
          <div class="thumbnail">
            <figure>
              <label>Imagem3: </label> {{$produto->imagem3}} <br />
              <img class="img-rounded" src="/uploads/{{$produto->imagem3}}" width="150" height="150"></img>
            </figure>
          </div>
        </td>
      </tr>
    </table>
</div>
@stop
