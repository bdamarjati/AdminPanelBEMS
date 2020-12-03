<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
  public $timestamps = false;
  protected $guarded = [];
  protected $table = 'gedung';

  public function scopeGetNextId($query){
  	return $query->select('id')->orderByDesc('id')->first();
  }

  public function scopeGetDeviceInfo($query){
		return $query->join('ref_lantai','gedung.id','ref_lantai.id_ref_gedung')
		->join('ref_ruang','ref_lantai.id','ref_ruang.id_ref_lantai')
		->join('device','ref_ruang.id','device.id_ref_ruang')
		->select('gedung.gedung','ref_lantai.lantai','ref_ruang.ruang','device.id','device.status')
		->get();
  }

}
