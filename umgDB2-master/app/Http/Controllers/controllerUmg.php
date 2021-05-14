<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use DB;

class controllerUmg extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function showRecuperacion(){
        return view('menu.recuperacion');
    }

    public function getDatabases()
    {

        $conexionSQL = $this->conexionInformationSchema("information_schema");
        
        $resultado = $conexionSQL->select("SELECT schema_name FROM schemata;");

        return response()->json($resultado, 200);
    }

    public function getTables(request $request)
    {
        $conexionSQL = $this->conexionInformationSchema("information_schema");

        $resultado = $conexionSQL->select("SELECT table_name FROM tables WHERE table_schema = '$request->table_schema'");

        return response()->json($resultado, 200);
    }

    public function getColumns(request $request)
    {
        $conexionSQL = $this->conexionInformationSchema("information_schema");
        $resultado = $conexionSQL->select("SELECT column_name FROM columns WHERE table_schema = '$request->table_schema' AND table_name = '$request->table_name'");

        return response()->json($resultado, 200);
    }

    public function conexionInformationSchema($base)
    {
        $configDb = [
            'driver'      => 'mysql',
            'host'        => env('DB_HOST', '127.0.0.1'),
            'port'        => env('DB_PORT', '3306'),
            'database'    => "$base",
            'username'    => env('DB_USERNAME', 'root'),
            'password'    => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset'     => 'utf8',
            'collation'   => 'utf8_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ];

       
        \Config::set('database.connections.dinamico', $configDb);
        $conexionSQL = DB::connection('dinamico');

        return $conexionSQL;
        // return response()->json($conexionSQL,200);
    }

    public function ejecutarSQL(Request $request)
    {
        $conexionSQL = $this->conexionInformationSchema("$request->database");
        
        $query = "SELECT ";

        $columnas = $request->columns;
        $count = count($columnas)-1;

        foreach ($columnas as $key => $value) {
            if ($key == $count) {
                $query .= "$value ";
            } else {
                $query .= "$value, ";
            }
        }

        $query .= "FROM $request->table ";

        if ($request->table2 != null && $request->tipo_join != null) {
            $query .= "$request->tipo_join $request->table2 ON $request->table"."."."$request->columns_table1 = $request->table2"."."."$request->columns2 ";
        }

        if ($request->table3 != null && $request->columns3 != null) {
            $query .= "WHERE $request->table3"."."."$request->columns3 $request->operador $request->where";
        }

        $query .= ";";
        $resultado = $conexionSQL->select($query);

        return response()->json($resultado, 200);
    }

    public function  dml(Request $request){
        $conexionSQL = $this->conexionInformationSchema($request->base);
        
        try {
            DB::beginTransaction();
            // $sql = 'insert into pruebad (nombres) values("prueba")';
            $sql = $request->sql;
        
            $data2 = DB::statement($sql);

            DB::commit();
            return response()->json($data2,200);

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json("SQL mal formado",200);

        }
              

        
    }

    public function getDml(){
        return view ('menu.manipulacion')
;    }

    public function grupo(){
        return view('grupo.index');
        //return 1;
    }
}
