{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Editar Documento vindo de :{ $documento->origem}")

@section('content_header')
    <h1>Editar o Documento {{ $documento->id }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
          <div class="card-body">
                <form action="{{ route('documentos.update', $documento->id) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')

                    @include('admin.pages.documentos._partials.form')
                </form>
          </div>

        </div>
    </div>
@stop
