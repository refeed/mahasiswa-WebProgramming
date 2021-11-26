<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $dates = ['tgl_terbit'];

    public function photos() {
        return $this->hasMany('App\Galeri', 'id_buku', 'id');
    }

    public function comments() {
        return $this->hasMany('App\Komentar', 'id_buku', 'id');
    }
}
