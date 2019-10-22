<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
	public $table = 'dev_jur';
	
	protected $fillable = [
		'nim','nama','kode_jur'
	];
}