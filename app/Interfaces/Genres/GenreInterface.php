<?php

namespace App\Interfaces\Genres;

use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;

interface GenreInterface
{

    /**
     * Get all Genre
     *
     * @method  GET api/Genre
     * @access  public
     */
    public function getAllGenre();

    /**
     * Get Album By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/Genre/{id}
     * @access  public
     */
    public function getGenreById($id);
}
