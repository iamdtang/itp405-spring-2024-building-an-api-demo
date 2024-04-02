<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $primaryKey = 'AlbumId';
    protected $fillable = ['Title', 'ArtistId'];
    public $timestamps = false;

    public function tracks()
    {
        // hasMany takes 2 additional args, the foreign key and local key (primary key)
        // tracks.AlbumId is the foregin key column
        return $this->hasMany(Track::class, 'AlbumId', 'AlbumId');
    }

    public function artist()
    {
        // albums.ArtistId is the foregin key
        return $this->belongsTo(Artist::class, 'ArtistId');
    }
}
