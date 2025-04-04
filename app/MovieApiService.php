<?php

namespace App;

use Illuminate\Http\Client\Pool;
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

    public function getMoviesDetails($ids) {


        $responses = Http::pool(function (Pool $pool) use ($ids) {
            $links = [];

            foreach ($ids as $id) {
                $links[] = $pool->get($this->baseUrl, [
                    'i' => $id,
                    'apiKey' => $this->apiKey,
                ]);
            }

            return $links;
        });

        $moviesDetails = [];

        foreach ($responses as $response) {
            if ($response->successful()) {
                $res = $response->json();
                $moviesDetails[$res['imdbID']] = [
                    'title' => $res['Title'],
                    'plot' => $res['Plot'],
                    'rating' => (float) $res['imdbRating'],
                    'runtime' => $res['Runtime'],
                    'genre' => explode(', ', $res['Genre'])[0],
                    'poster' => $res['Poster'],
                ];
            }
        }

        return $moviesDetails;
    }
}
