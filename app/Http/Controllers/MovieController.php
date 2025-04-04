<?php

namespace App\Http\Controllers;

use App\Models\Movie;


class MovieController extends Controller
{
    public function index() {
        $query = $_GET['q'] ?? '';
        $error = '';

        if ($query === '') {
            Movie::randomizeMovies();
        } else {
            // $error = Movie::updateMoviesResults($query);
        }

        $movies = Movie::all();

        return view('movie.index', compact('movies', 'query', 'error'));
    }
}
