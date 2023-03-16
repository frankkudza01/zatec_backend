<?php

namespace App\Repositories\Songs;

use DB;
use App\Models\Song;
use App\Traits\ResponseJson;
use App\Http\Requests\SongsRequest;
use App\Interfaces\Songs\SongsInterface;
use Symfony\Component\Console\Input\Input;

class SongsRepository implements SongsInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseJson;

    public function getAllSongs()
    {
        try {
            DB::beginTransaction();
            $songs = Song::all();
            DB::commit();
            return response()->json([
                'status' => true,
                'songs' => $songs
            ], 200);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getSongById($id)
    {
        try {
            $song = Song::find($id);

            // Check the song
            if(!$song) return $this->error("No song with ID $id", 404);

            return $this->success("song Detail", $song);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function requestSong(SongsRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If song exists when we find it
            // Then update the song
            // Else create the new one.
            $song = $id ? song::find($id) : new song;

            // Check the song
            if($id && !$song) return $this->error("No song with ID $id", 404);

            $song->title = $request->title;
            $song->length = $request->length;
            $song->genre_id = $request->genre_id;
            $song->album_id = $request->album_id;

            // Save the song
            $song->save();

            DB::commit();
            return response()->json([
                'status' => true,
                'data' => $song,
            ], 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteSong($id)
    {
        DB::beginTransaction();
        try {
            $song = Song::find($id);

            // Check the al$song
            if(!$song) return $this->error("No al$song with ID $id", 404);

            // Delete the al$song
            $song->delete();

            DB::commit();
            return $this->success("song deleted", $song);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}



