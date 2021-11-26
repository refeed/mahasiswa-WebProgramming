<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Komentar extends Model
{
    protected $table = 'komentar';

    public function getAuthorName() {
        return User::find($this->id_user)->name;
    }
}
