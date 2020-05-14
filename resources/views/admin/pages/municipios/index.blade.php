 {{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('municipios.index') }}">Municípios</a></li>
    </ol>

    <h1>Planos <a href="{{ route('municipios.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
                <form action="{{ route('municipios.search') }}" class="form form-inline" method="POST">
                    @csrf
                    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{  $filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-filter"></i> Filtrar</button>
                </form>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th style="width: 300px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($municipios as $municipio)
                            <tr>
                                <td>{{ $municipio->nome }}</td>
                                <td>{{ $municipio->descricao }}</td>

                                <td>

                                    <a href="{{ route('municipios.edit', $municipio->id) }}" class="btn btn-info">Editar</a>
                                    <a href="{{ route('municipios.show', $municipio->id) }}" class="btn btn-warning">Ver</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          </div>
          <div class="card-footer">
            @if (isset($filters))
                {!! $municipios->appends($filters)->links() !!}
            @else
                {!! $municipios->links() !!}
            @endif

          </div>

        </div>
    </div>
@stop
