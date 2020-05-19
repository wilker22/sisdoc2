{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Cadastrar Novo Município')

@section('content_header')
    <h1>Cadastrar Novo Município</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
          <div class="card-body">
                <form action="{{ route('municipios.store') }}" class="form" method="POST">
                    @csrf
                    @include('admin.pages.municipios._partials.form')
                </form>
          </div>

        </div>
    </div>
@stop
