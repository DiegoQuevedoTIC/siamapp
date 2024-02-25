<?php

namespace App\Http\Controllers;

use App\Models\CierreMensual;
use App\Models\CierreMensualDetalle;
use App\Models\Comprobante;
use App\Models\ComprobanteLinea;
use App\Models\Puc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CierreMensualController extends Controller
{
    //

    public function index()
    {
        /*Obtenemos todos los comprobantes del mes*/
        $comprobantes = Comprobante::whereBetween('fecha_comprobante', ['2024-02-01', '2024-02-29'])->get()->toArray();
        /*Puede que no devuelva ningun comprobante, para este caso, inicializamos todas las cuentas con 0.00*/
        if(empty($comprobantes))
        {
            $cierreMensual = new CierreMensual();
            $cierreMensual->fecha_cierre = '2024-03-01';
            $cierreMensual->mes_cierre = 'Febrero';
            $cierreMensual->user_id = Auth::id();
            //$cierreMensual->created_at = date('Y-m-d h:i:s');
            $cierreMensual->save();
            /*Obtenemos el id para insertar las lineas restantes*/ 
            $id = $cierreMensual->id;
            /*Buscamos todas las cuentas para ir inicializando todo en 0*/
            $puc = Puc::with('allPucs')->find(1)->get()->toArray();
            
        }
        
    }
}
    
