<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
  protected $guarded = [];
  protected $table = 'device';
  public $incrementing = false;

  public $timestamps = false;

	public function scopeGetInformation($query){
		return $query->join('ruang','ruang.id','device.id_ref_ruang')
		->select('device.id','device.updated_at','ruang.ruang','device.status')
		->get();
	}

	public function scopeGetAllInformation($query){
		return $query->join('ruang','ruang.id','device.id_ref_ruang')
		->join('users','users.id_ref_fakultas','users.id')
		->select('device.id','ruang.ruang','users.name','device.status')
		->get();
	}

}