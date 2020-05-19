{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Detalhes do Município { $municipio->nome }")

@section('content_header')
    <h1>Detalhes do Plano <b>{{  $municipio->nome }}</b></h1>
@stop

@section('content')
    <div class="card">
          <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $municipio->nome }}
                </li>

                <li>
                    <strong>Descrição: </strong> {{ $municipio->descricao }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('municipios.destroy', $municipio->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O {{ $municipio->nome }}</button>
            </form>
          </div>
    </div>
@endsection
