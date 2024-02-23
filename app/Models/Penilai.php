<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $incrementing = false;

    public function song (){

        return $this->hasMany(Song::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
