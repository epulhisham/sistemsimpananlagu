<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song_category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function song (){
        return $this->hasMany(Song::class);
    }
}
