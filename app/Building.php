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
		return $query->join('lantai','gedung.id','lantai.id_ref_gedung')
		->join('ruang','lantai.id','ruang.id_ref_lantai')
		->join('device','ruang.id','device.id_ref_ruang')
		->select('gedung.gedung','lantai.lantai','ruang.ruang','device.id','device.status')
		->get();
  }

}
