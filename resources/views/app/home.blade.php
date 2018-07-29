@extends('template')

@section('title', 'Sistema')

@section('content')




    <div class="row mt-5">

        <div class="col-md-3">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('app.home')}}">Pesquisar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('app.listar')}}">Itens Salvos</a>
                </li>
            </ul>
        </div>


        <div class="col-md-9">

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Pesquise pelo CNPJ Desejado" id="cnpj" name="pesquisar">
                <div class="input-group-prepend" id="button-addon3">
                    <button class="btn btn-success rounded-right" type="button" id="busca">Pesquisar</button>
                </div>
            </div>


            <form class="col-md-8 offset-md-1" id="empresa" METHOD="POST" action="{{ url('/salvar') }}">
                <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="empresa">Empresa:</label>
                    <input type="text" id="nome" class="form-control bg-transparent" readonly>
                </div>

                <div class="form-group">
                    <label for="natureza_juridica">Natureza Juridica:</label>
                    <input type="text" id="natureza_juridica" class="form-control bg-transparent" readonly>
                </div>

                <input type="hidden" id="cnpj" name="cnpj">

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary btn-sm" id="salvar">Salvar</button>
                </div>
            </form>
        </div>

    </div>

    <script>
        $(document).ready(function () {

            $('#empresa').hide();

            function mascaraCnpj(valor) {
                return valor.replace(/(\.|\/|\-)/g,"");
            }

            $('#busca').click(function () {

                var cnpj = $("#cnpj").val();
                cnpj = mascaraCnpj(cnpj);

                $.getJSON("/consulta/" + cnpj, function(dados) {
                    if (!("erro" in dados)) {
                        $('#empresa').show();
                        $("#empresa #nome").val(dados.nome);
                        $("#empresa #natureza_juridica").val(dados.natureza_juridica);
                        $("#empresa #cnpj").val(cnpj);

                    } else {
                        console.log('erro');
                    }
                });
            });
        })
    </script>


@endsection