{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Detalhes do Documento vindo de: { $documento->origem }")

@section('content_header')
    <h1>Detalhes do Dcoumento <b>{{  $documento->id }}</b></h1>
@stop

@section('content')
    <div class="card">
          <div class="card-body">
            <ul>
                <li><strong>ID: </strong> {{ $documento->id }}</li>
                <li><strong>Tipo: </strong> {{ $documento->id }}</li>
                <li><strong>Natureza: </strong> {{ $documento->id }}</li>
                <li><strong>Município: </strong> {{ $documento->id }}</li>
                <li><strong>Número: </strong> {{ $documento->id }}</li>
                <li><strong>Origem: </strong> {{ $documento->id }}</li>
                <li><strong>Data da Entrada: </strong> {{ $documento->id }}</li>
                <li><strong>Assunto: </strong> {{ $documento->id }}</li>
                <li><strong>Encaminhado para: </strong> {{ $documento->id }}</li>
                <li><strong>Data do Encaminhamento: </strong> {{ $documento->id }}</li>
                <li><strong>Providência: </strong> {{ $documento->descricao }}</li>
                <li><strong>Data da Providência: </strong> {{ $documento->id }}</li>
                <li><strong>Imagem: </strong> {{ $documento->id }}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O {{ $documento->id }}</button>
            </form>
          </div>
    </div>
@endsection
