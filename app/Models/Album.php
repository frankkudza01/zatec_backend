<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table='albums';
    protected $fillable=[
        'title',
        'release_date',
        'description',
        'cover_page',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function song()
    {
        return $this->hasMany(Song::class);
    }
}
