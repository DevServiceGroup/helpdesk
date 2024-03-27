<?php

namespace App\Http\Controllers;

use App\Models\Requerimientos;
use Illuminate\Http\Request;

class RequerimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requerimientosCompletados = Requerimientos::where('estado', 'Completado')->count();
        $requerimientossin = Requerimientos::where('estado', '!=', 'Completado')->count();
        return view('requerimientos')->with('requerimientos', $requerimientosCompletados)->with('requerimientossin', $requerimientossin);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->input('email') && $request->input('requerimiento') && $request->input('importancia') && $request->input('empresa')) {
            $email = $request->input('email');
            $requerimientoform = $request->input('requerimiento');
            $importancia = $request->input('importancia');
            $empresa = $request->input('empresa');
            $requerimiento = new Requerimientos;
            $requerimiento->email = $email;
            $requerimiento->requerimiento = $requerimientoform;
            $requerimiento->importancia = $importancia;
            $requerimiento->empresa = $empresa;
            $requerimiento->estado = 'En espera';
            if ($requerimiento->save()) {
                return back()->with('ok', 'ok');
            } else {
                return back()->with('ok', 'error');
            }
        } else {
            return back()->with('ok', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $requerimiento = Requerimientos::where('id', $id)->first();
        $requerimiento->estado = 'Completado';
        $requerimiento->save();
        return back()->with('ok', 'ok');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requerimientos $requerimientos)
    {
        //
    }
}
