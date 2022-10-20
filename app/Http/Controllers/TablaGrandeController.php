<?php

namespace App\Http\Controllers;

use App\Models\TablaGrande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class TablaGrandeController extends Controller
{
    public function listar() {

        // eloquent ORM
        $listado= TablaGrande::all();
        $listado[0]->texto="hola mundo";
        //var_dump($listado[0]);

        // consulta cruda, DB
        $listado=DB::select(DB::raw("select * from tablagrande"));
        //var_dump($listado[0]);

        // consulta ocupando query builder DB
        // Redis::del('llave1');

        $llave1=Redis::get("llave1",null);
        if($llave1===null) {
            $llave1=DB::table('tablagrande')->get();
            Redis::set('llave1',json_encode($llave1),'EX',600); // expira en 10 minutos
        } else {
            $llave1=json_decode($llave1);
        }
        return $llave1;
    }
}
