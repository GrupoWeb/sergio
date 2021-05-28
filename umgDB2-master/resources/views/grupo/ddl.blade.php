@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <b>
            <h1>
                <div class="card-header"> Definición de Datos</div>
                </h1>
                </b>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Para realizar pruebas con de Definición de Datos tome como referencia los siguientes ejemplos y utilicelos en la sección <b>Manipulación de Datos.</b><br />
                </div>
                <div class="card" style="width: 50rem;">
                <div class="card-body">
                    <h5 class="card-title">Ejemplo:</h5>
                    <p class="card-text">
                    <h6><b>a. CREATE TABLE</b></h6>
                        CREATE TABLE prueba2(<br />
                        id integer not null primary key auto_increment,<br />
                        nombre varchar(200)<br />
                        )<br />
                        <br />
                    <h6><b>b. DROP TABLE</b></h6>
                        DROP TABLE prueba2<br />

                        <br />
                        <div class="alert alert-danger" role="alert">
                        <b>Nota:</b> Para crear, alterar, eliminar Usuarios, Esquemas y Roles, se debe seleccionar la base de datos "information_schema"
                        </div>
                        
                    <h6><b>c. CREATE USER</b></h6>
                        CREATE USER 'juan'@'%' IDENTIFIED BY '12345678';<br />
                        <br />
                    <h6><b>d. ALTER USER</b></h6>
                        ALTER USER 'juan'@'%' PASSWORD EXPIRE;<br />
                        RENAME USER 'juan'@'%' TO 'jeff'@'%';<br />
                        <br />
                    <h6><b>e. DROP USER</b></h6>
                        DROP USER 'jeff'@'%';<br />
                        <br />
                    <h6><b>f. CREATE SCHEMA</b></h6>
                        CREATE DATABASE db_ejemplo;<br />
                        <br />
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection