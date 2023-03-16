<?php

namespace App\Interfaces\Albums;

use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;

interface AlbumsInterface
{

    /**
     * Get all Albums
     *
     * @method  GET api/Albums
     * @access  public
     */
    public function getAllAlbums();

    /**
     * Get Album By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/Albums/{id}
     * @access  public
     */
    public function getAlbumById($id);

    /**
     * Create | Update Album
     *
     * @param   \App\Http\Requests\AlbumRequest    $request
     * @param   integer                           $id
     *
     * @method  POST    api/Albums       For Create
     * @method  PUT     api/Albums/{id}  For Update
     * @access  public
     */
    public function requestAlbum(AlbumRequest $request, $id = null);

    /**
     * Delete Album
     *
     * @param   integer     $id
     *
     * @method  DELETE  api/Albums/{id}
     * @access  public
     */
    public function deleteAlbum($id);

}
