@extends('adminlte::page')

@section('title', 'Panel administrativo')

@section('content_header')
    <h1>Panel administrativo</h1>
@stop

@section('content')
    <p>Bienvenido al panel administrativo.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
