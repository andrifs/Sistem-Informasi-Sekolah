<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    //
    // protected $fillable = ['nama'];
    protected $guarded = ['id'];

     public function guru(){
        return $this->hasMany(Guru::class);
    }
}