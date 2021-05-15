<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banco;
class BancoController extends Controller
{
      public function saldo(){
        $banco = banco::get();
          return $banco;
      }
      public function store(Request $request){
        if (empty($request->saldo)) {
          
          return response()->json(
              [
                  'mensagem' =>"fail",
                  'Nomecampo'=>"Valor",
                  'error' => 'Campo Valor vazio!'
              ]
              , 400, 
              [
                  'X-Header-One' => 'Header Value'
              ]);    
      
       }
       elseif (empty($request->status)) {
          
        return response()->json(
            [
                'mensagem' =>"fail",
                'Nomecampo'=>"status",
                'error' => 'Campo status vazio!'
            ]
            , 400, 
            [
                'X-Header-One' => 'Header Value'
            ]);    
    
     }
       else {
         $bancoData = $request->all();
         $banco = new banco();
         $banco->Create($bancoData);
         return $banco;
       }
        
      }
}
