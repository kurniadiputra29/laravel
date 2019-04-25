<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SantriModel extends Model
{
    protected $table = 'santri';
    protected $fillable = ["nama", "email", "gender", "password"];
}
