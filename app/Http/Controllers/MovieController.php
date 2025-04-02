<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\MovieApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MovieController extends Controller
{
    public function index() {
        $movieApiService = new MovieApiService;

        $testResponse = $movieApiService->searchMovies('the greatest showman');
        $searchedMoviesIDs = array_column($testResponse, 'imdbID');

        Movie::truncate();

        foreach ($searchedMoviesIDs as $movieID) {
            $movieDetails = $movieApiService->getMovieDetails($movieID);
            Movie::updateOrCreate(['imdbID' => $movieID], $movieDetails);
        }


        $movies = Movie::all();

        $nullValues = fn($inp) => ($inp === 'rating') ? 0 : 'N/A';

        return view('movie.index', compact('movies', 'nullValues'));
    }
}
