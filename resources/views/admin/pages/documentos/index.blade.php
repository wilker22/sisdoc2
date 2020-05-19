 {{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('documentos.index') }}">Documentos</a></li>
    </ol>

    <h1>Cadastrar Documento <a href="{{ route('documentos.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
                <form action="{{ route('documentos.search') }}" class="form form-inline" method="POST">
                    @csrf
                    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{  $filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-filter"></i> Filtrar</button>
                </form>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            {{-- <th>Natureza do Documento</th> --}}
                            <th>Município</th>
                            <th>Número</th>
                            <th>Origem</th>
                            <th>Data da Entrada</th>
                            <th>Assunto</th>
                            <th>Encaminhado para:</th>
                            <th>Data do Encaminhamento</th>
                            {{-- <th>Providência Adotada</th>
                            <th>Data da Providência</th> --}}
                            {{-- <th>Imagem</th> --}}

                            <th style="width: 300px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documentos as $documento)
                            <tr>
                                <td>{{ $documento->id }}</td>
                                <td>{{ $documento->tipo }}</td>
                                {{-- <td>{{ $documento->natureza }}</td> --}}
                                <td>{{ $documento->municipio->name }}</td>
                                <td>{{ $documento->numero }}</td>
                                <td>{{ $documento->origem }}</td>
                                <td>{{ $documento->data_entrada }}</td>
                                <td>{{ $documento->assunto }}</td>
                                <td>{{ $documento->setor->name }}</td>
                                <td>{{ $documento->data_encaminhamento }}</td>
                                {{-- <td>{{ $documento->providencia }}</td>
                                <td>{{ $documento->data_providencia }}</td> --}}
                                {{-- <td>{{ $documento->imagem }}</td> --}}

                                <td>

                                    <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-info">Editar</a>
                                    <a href="{{ route('documentos.show', $documento->id) }}" class="btn btn-warning">Ver</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          </div>
          <div class="card-footer">
            @if (isset($filters))
                {!! $documentos->appends($filters)->links() !!}
            @else
                {!! $documentos->links() !!}
            @endif

          </div>

        </div>
    </div>
@stop
