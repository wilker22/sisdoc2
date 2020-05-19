{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Editar o Município { $municipio->nome}")

@section('content_header')
    <h1>Editar o Plano {{ $municipio->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
          <div class="card-body">
                <form action="{{ route('municipios.update', $municipio->id) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')

                    @include('admin.pages.municipios._partials.form')
                </form>
          </div>

        </div>
    </div>
@stop
