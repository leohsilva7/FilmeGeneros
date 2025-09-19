<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movies;
use App\Models\Generos;

class MoviesGenerosSeeder extends Seeder
{
    public function run(): void
    {
        // Criar alguns gêneros
        $acao = Generos::create(['title' => 'Ação']);
        $comedia = Generos::create(['title' => 'Comédia']);
        $drama = Generos::create(['title' => 'Drama']);

        // Criar alguns filmes
        $filme1 = Movies::create([
            'title' => 'Matrix',
            'synopsis' => 'Um hacker descobre a verdade sobre a realidade.',
            'duration' => 120,
            'releaseDate' => '1999-03-31',
        ]);

        $filme2 = Movies::create([
            'title' => 'Se Beber, Não Case!',
            'synopsis' => 'Três amigos acordam em Las Vegas sem lembrar da noite anterior.',
            'duration' => 110,
            'releaseDate' => '2009-06-05',
        ]);

        $filme3 = Movies::create([
            'title' => 'O Poderoso Chefão',
            'synopsis' => 'A história da família mafiosa Corleone.',
            'duration' => 175,
            'releaseDate' => '1972-03-24',
        ]);

        // Associar filmes com gêneros (tabela pivô movies_generos)
        $filme1->generos()->attach([$acao->id, $drama->id]); // Matrix -> Ação, Drama
        $filme2->generos()->attach([$comedia->id]);          // Se Beber, Não Case! -> Comédia
        $filme3->generos()->attach([$drama->id]);            // O Poderoso Chefão -> Drama
    }
}
