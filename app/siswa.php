<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    //
    //  protected $table = "siswas";
    protected $guarded = ['id'];

     public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
     public function user()
    {
        return $this->belongsTo(User::class);
    }


}