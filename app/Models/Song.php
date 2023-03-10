<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Song extends Model
{
    use HasFactory;

    protected $guarded = ['id,user_id,status_id,penilai_id,country_id,keputusan_id, song_category_id'];
    protected $casts = ['terbit' => 'boolean'];

    public function download ()
    {
        return $this->hasMany(Download::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    public function Status ()
    {
        return $this->belongsTo(Status::class);
    }

    public function penilai ()
    {
        return $this->belongsTo(Penilai::class,'penilai_id');
    }

    public function country ()
    {
        return $this->belongsTo(Country::class);
    }

    public function keputusan()
    {
        return $this->belongsTo(Keputusan::class,'keputusan_id');
    }

    public function song_category()
    {
        return $this->belongsTo(Song_category::class,'song_category_id');
    }
}
