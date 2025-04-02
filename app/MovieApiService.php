<?php

namespace App;

use Illuminate\Support\Facades\Http;

class MovieApiService
{
    protected $apiKey;
    protected $baseUrl;
    /**
     * Create a new class instance.
     */
    public function __construct() {
        $this->apiKey = config('services.omdb.key');
        $this->baseUrl = 'https://www.omdbapi.com/';
    }

    public function searchMovies($query) {
        $formattedQuery = str_replace(' ', '+', $query);

        $response = Http::get($this->baseUrl, [
            's' => $formattedQuery,
            'apiKey' => $this->apiKey,
            'type' => 'movie'
        ]);

        if (!$response->successful()) {
            return ['Error' => 'Unable to get data!'];
        }

        if ($response->json()['Response'] === 'False') {
            return ['Error' => $response->json()['Error']];
        }

        return $response->json()['Search'];
    }

    public function getMovieDetails($imdbID) {
        $response = Http::get($this->baseUrl, [
            'i' => $imdbID,
            'apiKey' => $this->apiKey,
        ]);


        if (!$response->successful()) {
            return ['Error' => 'Unable to get data!'];
        }

        if ($response->json()['Response'] === 'False') {
            return ['Error' => $response->json()['Error']];
        }

        $res = $response->json();

        return [
            'title' => $res['Title'],
            'plot' => $res['Plot'],
            'rating' => (float) $res['imdbRating'],
            'runtime' => $res['Runtime'],
            'genre' => explode(', ', $res['Genre'])[0],
            'poster' => $res['Poster'],
            'imdbID' => $res['imdbID'],
        ];
    }
}
