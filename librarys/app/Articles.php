<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    protected $table='article_info';
    protected $fillable=[
        'id',
        'title',
        'discription',
        't_id',
        'co_id',
        'content',
        'hits',
        'created_at',
        'updated_at'
    ] ;
    public function publisher(){
        return $this->belongsTo('App\UserInfo','t_id','user_id');
    }
}
