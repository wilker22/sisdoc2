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
                <li><strong>Tipo: </strong> {{ $documento->tipo }}</li>
                <li><strong>Natureza: </strong> {{ $documento->natureza }}</li>
                <li><strong>Município: </strong> {{ $documento->municipio->name }}</li>
                <li><strong>Número: </strong> {{ $documento->numero }}</li>
                <li><strong>Origem: </strong> {{ $documento->origem }}</li>
                <li><strong>Data da Entrada: </strong> {{ $documento->data_entrada }}</li>
                <li><strong>Assunto: </strong> {{ $documento->assunto }}</li>
                <li><strong>Encaminhado para: </strong> {{ $documento->setor->sigla }}</li>
                <li><strong>Data do Encaminhamento: </strong> {{ $documento->data_encaminhamento }}</li>
                <li><strong>Providência: </strong> {{ $documento->providencia }}</li>
                <li><strong>Data da Providência: </strong> {{ $documento->data_providencia }}</li>
                <li><strong>Imagem: </strong> {{ $documento->imagem }}</li>
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
