<?php

namespace App\Http\Controllers;

use App\Models\Generos;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Generos::all();
        if ($generos){
            return response()->json([
                'Lista de generos',
                'generos' => $generos,
            ],200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genero = Generos::create([
            'title' => $request['title'],
        ]);

        if($genero){
            return response()->json([
                'Genero Criado com sucesso!'
            ],201);
        }
        else{
            return response()->json([
                'Erro ao Criar Genero.',
            ],404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Generos $id)
    {
        $genero = Generos::findOrFail($id);
        if($genero){
            return response()->json([
                'Genero' => $genero,
            ],200);
        }
        else{
            return response()->json([
            'Erro ao Mostrar Genero'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Generos $genero)
    {
        $update = $genero->update([
            'title' => $request['title'],
        ]);
        if($update){
            return response()->json([
                'Genero' => $genero,
            ],200);
        }
        else{
            return response()->json([
                'Erro ao Atualizar Genero'
            ],404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generos $genero)
    {
        $delete = $genero->delete();
        if ($delete){
            return response()->json([
                'Genero Deletado com sucesso',
            ],200);
        }
        else{
            return response()->json([
                'Erro ao deletar Genero',
            ]);
        }

    }
}
