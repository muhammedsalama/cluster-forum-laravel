<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //

    protected $fillable = [
        'user_id',
        'reply_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reply(){
        return $this->belongsTo(Reply::class);
    }



}
