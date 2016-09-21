@extends('principal')

@section('conteudo')
<h1>Listagem de produtos</h1>
<table class="table">
    <tr>
      <td>Referencia</td>
      <td>Descricao</td>
      <td>Categoria</td>
      <td>Medida</td>
      <td>Peso</td>
      <td>Preço Compra</td>
      <td>Preco Venda</td>
      <td>Quantidade</td>
      <td/>
    </tr>
    @foreach ($produtos as $produto)
    <tr class=" {{ $produto->quantidade <=2 ? 'danger' : '' }} ">
      <td align="center"> {{$produto->referencia}} </td>
      <td align="center"> {{$produto->descricao}} </td>
      <td align="center"> {{$produto->id_categoria}} </td>
      <td align="center"> {{$produto->medida}} </td>
      <td align="center"> {{$produto->peso}} </td>
      <td align="center"> {{$produto->preco_compra}} </td>
      <td align="center"> {{$produto->preco_venda}} </td>
      <td align="center"> {{$produto->quantidade}} </td>
      <td>
        <a href="/produtos/mostra/{{$produto->id}}"><span class="glyphicon glyphicon-search"></span></a>
      </td>
    </tr>
    @endforeach
</table>
@stop
