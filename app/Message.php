<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable=['from','to','message','is_read'];
}
