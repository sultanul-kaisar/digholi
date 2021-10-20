<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable =[
        'name',
        'subject',
        'email',
        'message',
        'g-recaptcha-response'
    ];
}
