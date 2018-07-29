@extends('template')

@section('title', 'Sistema')

@section('content')

    <div class="row mt-5">

        <div class="col-md-3">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link " href="{{route('app.home')}}">Pesquisar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('app.listar')}}">Itens Salvos</a>
                </li>
            </ul>
        </div>

        <div class="col-md-9">
            <table class="table">
                <tr>
                    <td>ID Empresa</td>
                    <td>CNPJ</td>
                    <td>Nome da Empresa</td>
                    <td></td>
                </tr>

                @if(count($empresas) == 0)
                    <tr>
                        <td colspan="3">
                            <h3>Nenhuma empresa registrada</h3>
                        </td>
                    </tr>
                @else

                    @foreach($empresas as $emp)
                        <tr>
                            <td>{{ $emp->id }}</td>
                            <td>{{ $emp->cnpj }}</td>
                            <td>
                                <?php
                                    $json = $emp->json;
                                    $deJson = json_decode($json);
                                    print $deJson->nome;
                                ?>
                            </td>


                            <td>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ver{{$emp->id}}">
                                    <i class="icon ion-md-search"></i>
                                </a>

                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletar{{$emp->id}}">
                                    <i class="icon ion-md-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                @endif

            </table>

            {!! $empresas->render() !!}
        </div>


    </div>

    @foreach($empresas as $emp)
    <!-- Modal -->
    <div class="modal fade" id="ver{{ $emp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <?php
                            $json = $emp->json;
                            $deJson = json_decode($json);
                            print $deJson->nome;
                        ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>Endereço</strong></td>
                            <td>{{$deJson->logradouro}} {{$deJson->numero}}, {{$deJson->bairro}}, {{$deJson->cep}} <br>
                                {{$deJson->municipio}} - {{$deJson->uf}} </td>
                        </tr>
                        <tr>
                            <td><strong>Situação</strong></td>
                            <td>{{$deJson->situacao}}</td>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletar{{ $emp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <?php
                        $json = $emp->json;
                        $deJson = json_decode($json);
                        print $deJson->nome;
                        ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Deseja realmente apagar essa empresa?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary float-left" data-dismiss="modal">Cancelar</button>
                    <a href="{{route ('app.destroy',['id'=>$emp->id]) }}" class="btn btn-outline-danger float-right" >
                        Apagar
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection