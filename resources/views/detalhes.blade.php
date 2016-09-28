@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    </div>

    <h1>Detalhes do produto</h1>
    <br />
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group thumbnail">
              <label>Imagem 1</label>
              <figure align="center">
                <img class="img-rounded" name="img1" id="img1" src="/uploads/{{$produto->imagem1}}" height="150" width="200" alt="Prévia da imagem1...">
              </figure>
            </div>
          </div>

          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group thumbnail">
              <label>Imagem 2</label>
              <figure align="center">
                <img class="img-rounded" name="img2" id="img2" src="/uploads/{{$produto->imagem2}}" height="150" width="200" alt="Prévia da imagem2...">
              </figure>
            </div>
          </div>

          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group thumbnail">
              <label>Imagem 3</label>
              <figure align="center">
                <img class="img-rounded" name="img3" id="img3" src="/uploads/{{$produto->imagem3}}" height="150" width="200" alt="Prévia da imagem3...">
              </figure>
            </div>
          </div>
        </div>

            <label>Referência: </label> {{$produto->referencia}}&nbsp&nbsp
            <label>Medida: </label> {{$produto->medida}}&nbsp&nbsp
            <label>Peso: </label> {{$produto->peso}}<br />
            <label>Descrição: </label> {{$produto->descricao}}<br />
            <label>Preço Compra: </label> {{$produto->preco_compra}}&nbsp&nbsp
            <label>Preço Venda: </label> {{$produto->preco_venda}}&nbsp&nbsp<br />
            <label>Quantidade: </label> {{$produto->quantidade}}&nbsp&nbsp
            <label>Categoria: </label> {{$produto->categoria->nome}}<br /><br />
            <button style="width: 30%;" class="btn btn-md btn-default" type="button" tabindex="9" onclick="voltar();">Voltar</button>&nbsp&nbsp
</div>
<script type="text/javascript">
function voltar(){
  document.location = "/produtos";
}
</script>
@stop
