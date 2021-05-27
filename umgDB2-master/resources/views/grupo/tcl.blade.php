@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <b>
            <h1>
                <div class="card-header"> Control de transacciones</div>
                </h1>
                </b>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Para el control de transacciones únicamente se quema en código el realizar las transacciones dentro de un Try Catch, 
                    toda transacción realizada debe de estar dentro del Try.<br />
                    Mientras que si da un error debe capturar el error y desplegar un mensaje "SQL mal formado"
                </div>
                <div class="card" style="width: 50rem;">
                
                <img src="{{asset('img/tcl.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ejemplo:</h5>
                    <p class="card-text">
                    public function  dml(Request $request){<br />
                    $conexionSQL = $this->conexionInformationSchema($request->base);<br />
                    <br />
                    <b>
                    try {<br />
                        </b>
                        DB::beginTransaction();<br />
                        // $sql = 'insert into pruebad (nombres) values("prueba")';<br />
                        $sql = $request->sql;<br />
                    
                        $data2 = DB::statement($sql);<br />
                        <br />
                        <b>
                        DB::commit();<br />
                        </b>
                        return response()->json($data2,200);<br />
                        <br />
                        <b>
                    } catch (\Throwable $th) {<br />
                        DB::rollback();<br /></b>
                        return response()->json("SQL mal formado",200);<br />
                    }</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection