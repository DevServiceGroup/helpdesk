<?php

namespace App\Http\Controllers;

use App\Models\Requerimientos;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function requerimientos(Request $request)
    {
        if ($request->filled('prioridad')) {
            $requerimientos = Requerimientos::where('importancia', $request->input('prioridad'))
                ->where('estado', '!=', 'Completado')
                ->get();
        } else {
            $requerimientos = null;
        }
        return response()->json($requerimientos);
    }
    public function personales(Request $request)
    {
        if ($request->filled('email')) {
            $requerimientoperso = Requerimientos::where('email', $request->input('email'))
                ->get();
        } else {
            $requerimientoperso = null;
        }
        return view('personales')->with('requerimientopersonales', $requerimientoperso);
    }
}
