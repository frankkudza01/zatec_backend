<?php

namespace App\Interfaces\Songs;

use Illuminate\Http\Request;
use App\Http\Requests\SongsRequest;

interface SongsInterface
{

    /**
     * Get all Songs
     *
     * @method  GET api/Songs
     * @access  public
     */
    public function getAllSongs();

    /**
     * Get Song By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/Songs/{id}
     * @access  public
     */
    public function getSongById($id);

    /**
     * Create | Update Song
     *
     * @param   \App\Http\Requests\SongsRequest    $request
     * @param   integer                           $id
     *
     * @method  POST    api/Songs       For Create
     * @method  PUT     api/Songs/{id}  For Update
     * @access  public
     */
    public function requestSong(SongsRequest $request, $id = null);

    /**
     * Delete Song
     *
     * @param   integer     $id
     *
     * @method  DELETE  api/Songs/{id}
     * @access  public
     */
    public function deleteSong($id);

}
