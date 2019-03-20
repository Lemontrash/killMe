<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Messages extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'email', 'name', 'title','phone', 'message',
    ];


}
