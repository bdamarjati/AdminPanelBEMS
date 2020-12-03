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
		return $query->join('ref_ruang','ref_ruang.id','device.id_ref_ruang')
		->select('device.id','device.updated_at','ref_ruang.ruang','device.status')
		->get();
	}

	public function scopeGetAllInformation($query){
		return $query->join('ref_ruang','ref_ruang.id','device.id_ref_ruang')
		->join('users','users.id_ref_fakultas','users.id')
		->select('device.id','ref_ruang.ruang','users.name','device.status')
		->get();
	}

}