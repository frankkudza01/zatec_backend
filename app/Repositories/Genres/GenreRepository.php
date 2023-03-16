<?php

namespace App\Repositories\Genres;

use DB;
use App\Models\Genre;
use App\Models\Song;
use App\Traits\ResponseJson;
use App\Http\Requests\GenreRequest;
use App\Interfaces\Genres\GenreInterface;
use Symfony\Component\Console\Input\Input;

class GenreRepository implements GenreInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseJson;

    public function getAllGenre()
    {
        try {
            DB::beginTransaction();
            $genres = Genre::all();
            DB::commit();
            return response()->json([
                'status' => true,
                'genres' => $genres
            ], 200);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getGenreById($id)
    {
        try {
            $genre = Genre::find($id);

            // Check the genre
            if(!$genre) return $this->error("No genre with ID $id", 404);


            if($genre)
            {
                $songs=Song::latest()->where('genre_id','=',$genre->id)->get();
            }

            return response()->json([
                'status' => true,
                'genre' => $genre,
                'songs'=>$songs
            ], 200);

        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

}



