<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intrests extends Model
{
    protected $table = "intrests";
    public function users() {
        return $this->belongsTo(User::class);
    }
    public function services() {
        return $this->belongsTo(Services::class);
    }

    // 
}
