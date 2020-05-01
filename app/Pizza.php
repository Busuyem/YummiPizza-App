<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{

    public function user(){

        return $this->belongsTo(User::class);
    }
    protected $guarded = [];
}
