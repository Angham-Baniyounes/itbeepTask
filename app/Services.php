<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = "services";
    public function users() {
        return $this->belongsTo(User::class);
    }
    public function intrests() {
        return $this->hasMany(Intrests::class) ;
    }
}
