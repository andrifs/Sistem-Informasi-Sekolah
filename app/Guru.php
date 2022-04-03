<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    // protected $table = "siswas";
    protected $guarded = ['id'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}