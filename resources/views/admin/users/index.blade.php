@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
@livewire('admin.user-index')





@stop
