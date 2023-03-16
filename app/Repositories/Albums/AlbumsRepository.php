<?php

namespace App\Repositories\Albums;

use DB;
use App\Models\Album;
use App\Models\Song;
use App\Traits\ResponseJson;
use App\Http\Requests\AlbumRequest;
use App\Interfaces\Albums\AlbumsInterface;
use Symfony\Component\Console\Input\Input;

class AlbumsRepository implements AlbumsInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseJson;

    public function getAllAlbums()
    {
        try {
            DB::beginTransaction();
            $albums = Album::all();
            DB::commit();
            return response()->json([
                'status' => true,
                'albums' => $albums
            ], 200);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getAlbumById($id)
    {
        try {
            $album = Album::find($id);

            // Check the album
            if(!$album) return $this->error("No album with ID $id", 404);


            if($album)
            {
                $songs=Song::latest()->where('album_id','=',$album->id)->get();
            }

            return response()->json([
                'status' => true,
                'albums' => $album,
                'songs'=>$songs
            ], 200);

        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function requestAlbum(AlbumRequest $request, $id = null)
    {
        //DB::beginTransaction();
        //try {
            // If album exists when we find it
            // Then update the album
            // Else create the new one.
            $album = $id ? Album::find($id) : new Album;

            // Check the album
            if($id && !$album) return $this->error("No album with ID $id", 404);

            $album->title = $request->title;
            $album->release_date = $request->release_date;
            $album->description = $request->description;
            $album->user_id = auth()->user()->id;

            // cover page logic
            if($request->hasFile('cover_page')){
                $file=$request->file('cover_page');
                $fileName=time().'.'.$file->getClientOriginalExtension();
                $destinationPath=public_path('albums/cover_page/images/' );
                $file->move($destinationPath,$fileName);
                $album->cover_page=$fileName;
            }

            // Save the album
            $album->save();

        //    DB::commit();

            return response()->json([
                'status' => true,
                'data' => $album,
            ], 200);

       // } catch(\Exception $e) {
        //    DB::rollBack();
       //     return $this->error($e->getMessage(), $e->getCode());
       // }
    }

    public function deleteAlbum($id)
    {
        DB::beginTransaction();
        try {
            $album = Album::find($id);

            // Check the al$album
            if(!$album) return $this->error("No al$album with ID $id", 404);

            // Delete the al$album
            $album->delete();

            DB::commit();
            return $this->success("Album deleted", $album);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}



