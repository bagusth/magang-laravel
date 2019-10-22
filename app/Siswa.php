<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
	public $table = 'dev_siswa';
	protected $primaryKey = 'nim';
	public $timestamps = false;
	
	protected $fillable = [
		'nim','nama','kode_jur'
	];
}