<?php

namespace App\Http\Controllers\Genres;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;
use App\Interfaces\Genres\GenreInterface;

class GenreController extends Controller
{
    protected $genreInterface;

    public function __construct(GenreInterface $genreInterface)
    {
        $this->genreInterface = $genreInterface;
    }

    public function index()
    {
        return $this->genreInterface->getAllGenre();
    }

    public function show($id)
    {
        return $this->genreInterface->getGenreById($id);
    }
}
