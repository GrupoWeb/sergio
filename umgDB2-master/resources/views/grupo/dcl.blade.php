@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <b>
            <h1>
                <div class="card-header"> Control de Datos</div>
                </h1>
                </b>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Para realizar pruebas con de Control de Datos tome como referencia los siguientes ejemplos y utilicelos en la sección <b>Manipulación de Datos.</b><br />
                </div>
                <div class="card" style="width: 50rem;">
                <div class="card-body">
                    <h5 class="card-title">Ejemplo:</h5>
                    <p class="card-text">
                        <div class="alert alert-danger" role="alert">
                        <b>Nota:</b> Para crear, alterar, eliminar Usuarios, Esquemas y Roles, se debe seleccionar la base de datos "information_schema"
                        </div>
                        <br />
                    <h6><b>a. GRANT ROLE</b></h6>
                    <div class="alert alert-primary" role="alert">
                            Para que funcione el GRANT asegurese de crear el usuario de ejemplo anteriormente con:
                            CREATE USER 'db_user'@'%' IDENTIFIED BY 'P@s$w0rd123!';
                    </div>
                        GRANT ALL PRIVILEGES ON *.* TO 'db_user'@'%' IDENTIFIED BY 'P@s$w0rd123!';<br />
                        <br />
                    <h6><b>b. REVOKE ROLE</b></h6>
                        REVOKE INSERT ON *.* FROM 'db_user'@'%';<br />
                        REVOKE INSERT ON *.* FROM 'db_user'@'localhost';<br />
                        <br />

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection