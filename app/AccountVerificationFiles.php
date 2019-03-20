<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountVerificationFiles extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'file_id', 'selfie', 'bank', 'dod'
    ];
}
