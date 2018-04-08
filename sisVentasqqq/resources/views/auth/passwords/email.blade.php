@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buenos dias Sr Usuario</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    
                    <p>
                      Si olvidaste tu Contraseña Comunicate con el Administrador
                     
                    </p>
@endsection
