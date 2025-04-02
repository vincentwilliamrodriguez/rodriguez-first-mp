<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    protected $sampleMovies = [
        "tt1485796 "=> "https://m.media-amazon.com/images/M/MV5BMjI1NDYzNzY2Ml5BMl5BanBnXkFtZTgwODQwODczNTM@._V1_SX300.jpg",
        "tt0910970 "=> "https://m.media-amazon.com/images/M/MV5BMjExMTg5OTU0NF5BMl5BanBnXkFtZTcwMjMxMzMzMw@@._V1_SX300.jpg",
        "tt0317219 "=> "https://m.media-amazon.com/images/M/MV5BMTg5NzY0MzA2MV5BMl5BanBnXkFtZTYwNDc3NTc2._V1_SX300.jpg",
        "tt1216475 "=> "https://m.media-amazon.com/images/M/MV5BMTUzNTc3MTU3M15BMl5BanBnXkFtZTcwMzIxNTc3NA@@._V1_SX300.jpg",
        "tt3606752 "=> "https://m.media-amazon.com/images/M/MV5BMTc0NzU2OTYyN15BMl5BanBnXkFtZTgwMTkwOTg2MTI@._V1_SX300.jpg",
        "tt3566834 "=> "https://m.media-amazon.com/images/M/MV5BYzFjMzNjOTktNDBlNy00YWZhLWExYTctZDcxNDA4OWVhOTJjXkEyXkFqcGc@._V1_SX300.jpg",
        "tt0816692 "=> "https://m.media-amazon.com/images/M/MV5BYzdjMDAxZGItMjI2My00ODA1LTlkNzItOWFjMDU5ZDJlYWY3XkEyXkFqcGc@._V1_SX300.jpg",
        "tt0032138 "=> "https://m.media-amazon.com/images/M/MV5BYWRmY2I0MGItYTQ0OC00NWZmLWIwMDktYjJlNDc0MzVhMmViXkEyXkFqcGc@._V1_SX300.jpg",
        "tt0064418 "=> "https://m.media-amazon.com/images/M/MV5BODk3MmYzOWYtNmQzZC00NTQyLWJjM2EtMDEzZjc3NDYxYWI4XkEyXkFqcGc@._V1_SX300.jpg",
        "tt0848228 "=> "https://m.media-amazon.com/images/M/MV5BNGE0YTVjNzUtNzJjOS00NGNlLTgxMzctZTY4YTE1Y2Y1ZTU4XkEyXkFqcGc@._V1_SX300.jpg",
        "tt4154796 "=> "https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",
        "tt4154756 "=> "https://m.media-amazon.com/images/M/MV5BMjMxNjY2MDU1OV5BMl5BanBnXkFtZTgwNzY1MTUwNTM@._V1_SX300.jpg",
        "tt0382932 "=> "https://m.media-amazon.com/images/M/MV5BMTMzODU0NTkxMF5BMl5BanBnXkFtZTcwMjQ4MzMzMw@@._V1_SX300.jpg",
    ];

    protected $sampleGenres = [
        'Action', 'Adventure', 'Animation', 'Biography', 'Comedy',
        'Crime', 'Documentary', 'Drama', 'Family', 'Fantasy',
        'Horror', 'Mystery', 'Romance', 'Sci-Fi', 'Thriller'
    ];

    public function definition(): array
    {
        $randomMovieID = array_rand($this->sampleMovies);
        $title = $this->faker->sentence(2);

        return [
            'title' => substr(Str::apa($title), 0, -1),
            'plot' => $this->faker->realText(150, 2),
            'rating' => $this->faker->numberBetween(10, 100) / 10,
            'runtime' => $this->faker->numberBetween(60, 180).' min',
            'genre' => $this->faker->randomElement($this->sampleGenres),
            'imdbID' => $randomMovieID,
            'poster' => $this->sampleMovies[$randomMovieID],
        ];
    }
}
