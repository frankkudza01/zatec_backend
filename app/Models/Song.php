<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table='songs';
    protected $fillable=[
        'title',
        'length',
        'genre_id',
        'album_id'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class,'album_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class,'genre_id');
    }
}
