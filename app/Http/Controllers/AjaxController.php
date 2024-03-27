<?php

namespace App\Http\Controllers;

use App\Models\Requerimientos;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function requerimientos(Request $request){
        if ($request->filled('prioridad')) {
            $requerimientos = Requerimientos::where('importancia',$request->input('prioridad'))->get();
        
        }else{
            $requerimientos=null;
        }
        return response()->json($requerimientos);
        
    }
}
