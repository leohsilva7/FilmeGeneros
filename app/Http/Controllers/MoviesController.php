<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;
use App\Models\Movies;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movies::all();
        return response()->json([
            'Todos os filmes',
            'filme' => $movies,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        $movie = Movies::create([
            'title' => $request['title'],
            'synopsis' => $request['synopsis'],
            'duration' => $request['duration'],
            'releaseDate' => $request['releaseDate'],
        ]);
        if($movie){
            return response()->json(
                [
                    'Filme adicionado com sucesso!'
                ],201
                );
        }
        else{
            return response()->json([
                'Erro ao adicionar filme!'
            ],404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movies::findOrFail($id);
        if($movie){
            return response()->json([
                'Filme' => $movie
            ], 200);}
        else{
            return response()->json([
                'Erro ao consultar filme'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movies $movie)
    {
        $atualizou = $movie->update([
                'title' => $request['title'],
                'synopsis' => $request['synopsis'],
                'duration' => $request['duration'],
                'releaseDate' => $request['releaseDate'],
         ]);
        if($atualizou){
            return response()->json([
                'Filme atualizado com sucesso',
                'filme' => $movie
            ], 200);
        }
        else{
            return response()->json([
                'Erro ao atualizar filme'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movies $movie)
    {
        $delete = $movie->delete();
        if ($delete){
            return response()->json([
                'Filme deletado com sucesso',
            ],200);
        }
        else{
            return response()->json([
                'Erro ao deletar filme'
            ],404);
        }
    }
}
