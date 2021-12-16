<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'to', 'from', 'message', 'send_at', 'recieve_at', 'read_at'
    ];

    public function toUser(){
        return $this->belongsTo(\App\User::class, 'to', 'id');
    }

    public function fromUser()
    {
        return $this->belongsTo(\App\User::class, 'from', 'id');
    }
}
