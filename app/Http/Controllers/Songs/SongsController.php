<?php

namespace App\Http\Controllers\Songs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SongsRequest;
use App\Interfaces\Songs\SongsInterface;

class SongsController extends Controller
{
    protected $songsInterface;

    public function __construct(SongsInterface $songsInterface)
    {
        $this->songsInterface = $songsInterface;
    }

    public function index()
    {
        return $this->songsInterface->getAllSongs();
    }

    public function store(SongsRequest $request)
    {
        return $this->songsInterface->requestSong($request);
    }

    public function show($id)
    {
        return $this->songsInterface->getSongById($id);
    }

    public function update(SongsRequest $request, $id)
    {
        return $this->songsInterface->requestSong($request, $id);
    }

    public function destroy($id)
    {
        return $this->songsInterface->deleteSong($id);
    }
}
