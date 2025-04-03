<?php

namespace App\Models;

use App\MovieApiService;
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

        Movie::truncate();

        foreach ($searchedMoviesIDs as $movieID) {
            $movieDetails = $movieApiService->getMovieDetails($movieID);
            Movie::updateOrCreate(['imdbID' => $movieID], $movieDetails);
        }
    }
}
