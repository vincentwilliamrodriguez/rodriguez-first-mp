<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('movies')->insert([
        //     'title' => 'Awaw',
        //     'plot' => '1234567890123456789012345678901234567890',
        //     'rating' => 0,
        //     'runtime' => '170 min',
        //     'genre' => 'N/A',
        //     'poster' => 'N/A',
        //     'imdbID' => 'asdfghj',
        // ]);
        Movie::factory()->count(10)->create();
    }
}
