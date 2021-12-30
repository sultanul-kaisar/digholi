<?php

namespace App\CoverPhoto;

use Illuminate\Database\Eloquent\Model;

class PortfolioPhoto extends Model
{
    protected $fillable = ['title', 'image', 'status'];
}
