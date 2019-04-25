<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model

{
	protected $table = 'profil';
    protected $fillable = ['depan', 'belakang', 'alamat', 'avatar'];
    public function getModalAttribute()
    {
    	$out = "{$this->depan} {$this->belakang}";
    	$me = strtoupper($out);

    	return $me;
    }
    public function getNamaAttribute()
    {
    	$out = "{$this->depan} {$this->belakang}";

    	return $out;
    }
}
