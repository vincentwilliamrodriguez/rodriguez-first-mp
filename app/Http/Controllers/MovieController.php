<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\MovieApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MovieController extends Controller
{
    public function index() {
        $query = 'the quick';
        // Movie::updateMoviesResults($query);

        $movies = Movie::all();

        return view('movie.index', compact('movies', 'query'));
    }
}
