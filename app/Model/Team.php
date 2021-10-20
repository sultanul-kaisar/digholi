<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
            'title',
            'slug',
            'team_department_id',
            'description',
            'address',
            'phone',
            'email',
            'image',
            'url',
            'facebook',
            'instagram',
            'twitter',
            'status'

        ];
    public function team_department(){
        return $this->belongsTo('App\Model\TeamDepartment');
    }
}
