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

        $testResponse = $movieApiService->searchMovies($query);
        $searchedMoviesIDs = array_column($testResponse, 'imdbID');
        $error = $searchedMoviesIDs['Error'] ?? '';

        if ($error === '') {
            Movie::truncate();

            foreach ($searchedMoviesIDs as $movieID) {
                $movieDetails = $movieApiService->getMovieDetails($movieID);
                Movie::updateOrCreate(['imdbID' => $movieID], $movieDetails);
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
