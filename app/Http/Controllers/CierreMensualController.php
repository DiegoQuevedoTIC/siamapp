<?php

namespace App\Http\Controllers;

use App\Models\CierreMensual;
use App\Models\CierreMensualDetalle;
use App\Models\Comprobante;
use App\Models\ComprobanteLinea;
use App\Models\Puc;
use Illuminate\Http\Request;

class CierreMensualController extends Controller
{
    //

    public function index()
    {
        /*Obtenemos las pucs*/
        $puc = Puc::all()->toArray();
        /*buscamos los saldos anteriores en el cierre mensual*/
        foreach($puc as $key => $value){
            $query = CierreMensualDetalle::where('puc_id', '', $value['id']);
            if(empty($query))
            {
               $saldoAnterior = 0.00;
               /*Insertamos el registro para inicializar el asiento*/
               $cierreMensual = [
                'fecha' => '2024-02-15',
                'mes_cierre' => 'Febrero',
                'user_id' => 1
               ];

            }
        }
        
    }
}
    
