<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable =[
    	'name', 'email', 'password'
    ];

    public function articles()
    {
    	return $this->hasMany(Article::class);
    }

}
