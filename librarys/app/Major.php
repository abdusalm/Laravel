<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    //
    protected $table='major';

    protected $fillable=[
        'id',
        'major_name',
        'major_id',
        'ins_id',
        'created_at',
        'updated_at'
    ];

    public function courses(){
        return $this->hasMany('App\Course','major_id','major_id');
    }

    public function articles(){
        return $this->hasManyThrough('App\Articles',
            'App\Course',
            'major_id',
            'co_id',
            'major_id',
            'co_id');
    }
}

