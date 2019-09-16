<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //
    protected $table='collection';

    protected $fillable=[
        'id','article_id','user_id',
        'created_at','updated_at'
    ];
}
