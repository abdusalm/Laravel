<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    //
    protected $table='institute';

    protected $fillable=[
        'id','ins_name','ins_id',
        'created_at','updated_at'
    ];
    public function majors(){
        return $this->hasMany('App\Major','ins_id','ins_id');
    }

    public function courses(){
        return $this->hasManyThrough('App\Course',
            'App\Major',
            'ins_id',
            'major_id',
            'ins_id',
            'major_id');
    }
}
