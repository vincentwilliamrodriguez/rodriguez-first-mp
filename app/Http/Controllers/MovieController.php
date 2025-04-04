<?php

namespace App\Http\Controllers;

use App\Models\Movie;


class MovieController extends Controller
{
    public function index() {
        $query = $_GET['q'] ?? '';
        $error = '';
        $isNewSearch = !isset($_GET['page']);

        if ($isNewSearch) {
            if ($query === '') {
                Movie::randomizeMovies();
            } else {
                $error = Movie::updateMoviesResults($query);
            }
        }
        

        $movies = Movie::query()->paginate(6);

        return view('movie.index', compact('movies', 'query', 'error'));
    }
}
