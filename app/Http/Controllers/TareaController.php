<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.lista-tarea-index', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tareas.lista-tarea-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:20',
            'descripcion' => [
                'required',
                'min:10',
                'max:200'
            ],
        ]);

        $tarea = new Tarea();
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->save();
        return redirect()->route('tarea.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.lista-tarea-show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        return view('tareas.lista-tarea-edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'titulo' => 'required|max:20',
            'descripcion' => [
                'required',
                'min:10',
                'max:200'
            ],
        ]);

        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->save();
        return redirect()->route('tarea.show', $tarea->id);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tarea.lista-tarea.index');
    }
}
