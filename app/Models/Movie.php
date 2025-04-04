<?php

namespace App\Models;

use App\MovieApiService;
use Database\Seeders\MovieSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $fillable = [
        'title',
        'plot',
        'rating',
        'runtime',
        'genre',
        'poster',
        'imdbID',
    ];

    public static function updateMoviesResults($query) {
        $movieApiService = new MovieApiService;

        $response = $movieApiService->searchMovies($query);
        $searchedMoviesIDs = array_column($response, 'imdbID');
        $error = $searchedMoviesIDs['Error'] ?? '';

        if ($error === '') {
            Movie::truncate();

            $moviesDetails = $movieApiService->getMoviesDetails($searchedMoviesIDs);

            foreach ($moviesDetails as $imdbID => $movieDetails) {
                Movie::updateOrCreate(['imdbID' => $imdbID], $movieDetails);
            }
        }

        return $error;
    }

    public static function randomizeMovies() {
        Movie::truncate();

        $seeder = new MovieSeeder();
        $seeder->run();
    }
}
