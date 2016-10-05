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
      <div class="col-xs-12 col-sm-3 col-md-12">
        <h3>Categorias</h3>
        <form class="navbar-form navbar-right">
          <div class="form-group">
            <input id="filtro-nome" type="text" class="form-control" placeholder="Digite a referência ou nome do produto..." style="min-width:300px;">
          </div>
        </form>
      </div>
        <div class="col-xs-12 col-sm-3 col-md-12">
          <table class="table table-responsive" id="lista">
            <thead>
              <tr class="indices">
                <td>Id</td>
                <td>Nome</td>
                <td colspan="3">Ações</td>
              </tr>
            </thead>
            <tbody>
              @foreach($categorias as $categoria)
              <tr class="valores">
                <td id="id">{{$categoria->id}}</td>
                <td id="nome">{{$categoria->nome}}</td>
                <td>
                  <a href="javascript:confirmar();"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
                <td>
                  <a href="/produtos/categoria/altera/{{$categoria->id}}"><span class="glyphicon glyphicon-pencil"></span></a>
                </td>              </tr>
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
  if(confirm('Confirmar a exclusão da categoria {{$categoria->nome}}??')) {
    document.location = "/produtos/categoria/remove/{{$categoria->id}}";
  }
}

jQuery('#filtro-nome').keyup(function() {
    var valorFiltro = $(this).val().toLowerCase();
    var corresponde = false;

    jQuery('#lista>tbody').find('tr').each(function() {

        var conteudoCelulaReferencia = jQuery(this).find('td#id').text();
        var corresponde1 = conteudoCelulaReferencia.toLowerCase().indexOf(valorFiltro) >= 0;

        var conteudoCelulaDescricao = jQuery(this).find('td#nome').text();
        var corresponde2 = conteudoCelulaDescricao.toLowerCase().indexOf(valorFiltro) >= 0;

        corresponde = corresponde1 || corresponde2;

        jQuery(this).css('display', corresponde ? '' : 'none');
    });
});

</script>
@stop
