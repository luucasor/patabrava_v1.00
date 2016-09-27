@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-3">
        <h3>Listagem de produtos</h3>
        <table class="table">
            <tr>
              <td align="center">Referencia</td>
              <td align="center">Descricao</td>
              <td align="center">Categoria</td>
              <td align="center">Medida</td>
              <td align="center">Peso</td>
              <td align="center">Preço Compra</td>
              <td align="center">Preco Venda</td>
              <td align="center">Quantidade</td>
              <td colspan="3"/>

            </tr>
            @foreach($produtos as $produto)
            <tr class=" {{ $produto->quantidade <=2 ? 'danger' : '' }} ">
              <td align="center"> {{$produto->referencia}} </td>
              <td align="center"> {{$produto->descricao}} </td>
              <td align="center"> {{$produto->categoria->nome}} </td>
              <td align="center"> {{$produto->medida}} </td>
              <td align="center"> {{$produto->peso}} </td>
              <td align="center"> {{$produto->preco_compra}} </td>
              <td align="center"> {{$produto->preco_venda}} </td>
              <td align="center"> {{$produto->quantidade}} </td>
              <td>
                <a href="javascript:confirmar();"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
              <td>
                <a href="/produtos/altera/{{$produto->id}}"><span class="glyphicon glyphicon-pencil"></span></a>
              </td>
              <td>
                <a href="/produtos/mostra/{{$produto->id}}"><span class="glyphicon glyphicon-search"></span></a>
              </td>
            </tr>
            @endforeach
        </table>


        @if(old('descricao'))
          <div class="alert alert-success">
            <strong>Sucesso!</strong>
                O produto '{{ old('descricao') }}' foi {{ old('tipo') }}.
          </div>
        @endif
    </div>
  </div>
</div>
<script type="text/javascript">

function confirmar(){
  if(confirm('Confirmar a exclusão do produto {{$produto->referencia}}??')) {
    document.location = "/produtos/remove/{{$produto->id}}";
  }
}

</script>
@stop
