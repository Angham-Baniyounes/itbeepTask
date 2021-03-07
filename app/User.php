<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    public function services() {
        return $this->hasMany(Services::class) ;
    }
    public function intrests() {
        return $this->hasMany(Intrests::class) ;
    }
}
