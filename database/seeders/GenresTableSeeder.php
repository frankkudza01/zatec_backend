<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'title' => 'Popular music',
            'description' => 'Popular music is music with wide appeal that is typically distributed to large audiences through the music industry.'
        ]);

        Genre::create([
            'title' => 'Pop Music',
            'description' => 'Pop music is a genre of popular music that originated in its modern form during the mid-1950s in the United States and the United Kingdom.'
        ]);

        Genre::create([
            'title' => 'Rock',
            'description' => 'Rock music is a broad genre of popular music that originated as "rock and roll" in the United States in the late 1940s and early 1950s.'
        ]);


        Genre::create([
            'title' => 'Hip hop music',
            'description' => 'Hip hop music or hip-hop music, also known as rap music and formerly known as disco rap, is a genre of popular music that originated in New York City in the 1970s.'
        ]);


        Genre::create([
            'title' => 'Jazz',
            'description' => 'Jazz is a music genre that originated in the African-American communities of New Orleans, Louisiana, in the late 19th and early 20th centuries.'
        ]);

        Genre::create([
            'title' => 'Country music',
            'description' => 'Country is a music genre originating in the Southern and Southwestern United States. First produced in the 1920s.'
        ]);


    }
}
