<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\MovieApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MovieController extends Controller
{
    public function index() {
        Movie::updateMoviesResults('wall-e');

        $movies = Movie::all();
        $nullValues = fn($inp) => ($inp === 'rating') ? 0 : 'N/A';

        return view('movie.index', compact('movies', 'nullValues'));
    }
}
