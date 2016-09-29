@extends('layouts.app')

@section('content')

<style media="screen">
.indices{
  text-align: center;
  font-weight: bold;
}
.valores{
  text-align: center;
}
</style>

<div class="container">
  <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-3">
        <h3>Listagem de produtos</h3>
        <form class="navbar-form navbar-right">
          <div class="form-group">
            <input id="filtro-nome" type="text" class="form-control" placeholder="Digite a referência ou nome do produto..." style="min-width:300px;">
          </div>
        </form>
      </div>
        <div class="col-md-12 col-xs-12 col-sm-3">
          <table class="table table-responsive" id="lista">
            <thead>
              <tr class="indices">
                <td>Referencia</td>
                <td>Descricao</td>
                <td class="hidden-xs">Categoria</td>
                <td class="hidden-xs">Medida</td>
                <td class="hidden-xs">Peso</td>
                <td class="hidden-xs">Preço Compra</td>
                <td class="hidden-xs">Preco Venda</td>
                <td class="hidden-xs">Quantidade</td>
                <td colspan="3">Ações</td>
              </tr>
            </thead>
            <tbody>
              @foreach($produtos as $produto)
              <tr class="valores {{ $produto->quantidade <=2 ? 'danger' : '' }} ">
                <td id="referencia">{{$produto->referencia}}</td>
                <td id="descricao">{{$produto->descricao}}</td>
                <td class="hidden-xs">{{$produto->categoria->nome}}</td>
                <td class="hidden-xs">{{$produto->medida}}</td>
                <td class="hidden-xs">{{$produto->peso}}</td>
                <td class="hidden-xs">R$ {{$produto->preco_compra}}</td>
                <td class="hidden-xs">R$ {{$produto->preco_venda}}</td>
                <td class="hidden-xs">{{$produto->quantidade}}</td>
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
            </tbody>
          </table>
      </div>
  </div>

  @if(old('descricao'))
    <div class="alert alert-success">
      <strong>Sucesso!</strong>
          O produto '{{ old('descricao') }}' foi {{ old('tipo') }}.
    </div>
  @endif
</div>

<script type="text/javascript">

function confirmar(){
  if(confirm('Confirmar a exclusão do produto {{$produto->referencia}}??')) {
    document.location = "/produtos/remove/{{$produto->id}}";
  }
}

jQuery('#filtro-nome').keyup(function() {
    var valorFiltro = $(this).val().toLowerCase();
    var corresponde = false;

    jQuery('#lista>tbody').find('tr').each(function() {

        var conteudoCelulaReferencia = jQuery(this).find('td#referencia').text();
        var corresponde1 = conteudoCelulaReferencia.toLowerCase().indexOf(valorFiltro) >= 0;

        var conteudoCelulaDescricao = jQuery(this).find('td#descricao').text();
        var corresponde2 = conteudoCelulaDescricao.toLowerCase().indexOf(valorFiltro) >= 0;

        corresponde = corresponde1 || corresponde2;

        jQuery(this).css('display', corresponde ? '' : 'none');
    });
});

</script>
@stop
