{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Cadastrar Novo Documento')

@section('content_header')
    <h1>Cadastrar Novo Documento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
          <div class="card-body">
                <form action="{{ route('documentos.store') }}" class="form" method="POST">
                    @csrf
                    @include('admin.pages.documentos._partials.form')
                </form>
          </div>

        </div>
    </div>
@stop
