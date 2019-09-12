<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table='course';
    protected $fillable=[
        'id',
        'co_name',
        'co_id',
        'major_id',
        'created_at',
        'updated_at'
    ];
}
