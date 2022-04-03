<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    //
    // protected $fillable = ['nama'];
    protected $guarded = ['id'];
     public function siswa(){
        return $this->hasMany(siswa::class);
    }
}