<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $table='user_info';
    protected $fillable=[
        'id','username',
        'password',
        'user_id',
        'role',
        'motto',
        'resume',
        'created_at','updated_at'
    ];

    public function articles()
    {
        return $this->hasMany(Articles::class,'t_id','user_id');
    }
}
