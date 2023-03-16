<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;
use App\Interfaces\Albums\AlbumsInterface;

class AlbumsController extends Controller
{
    protected $albumsInterface;

    public function __construct(AlbumsInterface $albumsInterface)
    {
        $this->albumsInterface = $albumsInterface;
    }

    public function index()
    {
        return $this->albumsInterface->getAllAlbums();
    }

    public function store(AlbumRequest $request)
    {
        return $this->albumsInterface->requestAlbum($request);
    }

    public function show($id)
    {
        return $this->albumsInterface->getAlbumById($id);
    }

    public function update(AlbumRequest $request, $id)
    {
        return $this->albumsInterface->requestAlbum($request, $id);
    }

    public function destroy($id)
    {
        return $this->albumsInterface->deleteAlbum($id);
    }
}
