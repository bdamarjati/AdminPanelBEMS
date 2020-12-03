<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'fakultas';

    public function scopeGetId($query){
        return $query->select('id')->orderByDesc('id')->first();
    }

    public function scopeGetFakultasInfo($query){
        return $query->join('gedung','fakultas.id','gedung.id_ref_fakultas')
        ->join('ref_lantai','gedung.id','ref_lantai.id_ref_gedung')
        ->select('ref_lantai.id','ref_lantai.id_ref_gedung','gedung.gedung','fakultas.keterangan')
		->get();
    }

    public function scopeGetGedungInfo($query){
        return $query->join('gedung','fakultas.id','gedung.id_ref_fakultas')
        ->select('gedung.id','gedung.id_ref_fakultas','gedung.gedung','fakultas.keterangan')
		->get();
    }

    public function scopeGetRuangInfo($query){
        return $query->join('gedung','fakultas.id','gedung.id_ref_fakultas')
        ->join('ref_lantai','gedung.id','ref_lantai.id_ref_gedung')
        ->join('ref_ruang','ref_lantai.id','ref_ruang.id_ref_lantai')
        ->select('ref_ruang.id','ref_ruang.id_ref_lantai','ref_ruang.ruang','ref_lantai.lantai','gedung.gedung','fakultas.keterangan')
        ->get();
    }

    public function scopeGetAllDeviceInfo($query){
        return $query->join('gedung','fakultas.id','gedung.id_ref_fakultas')
        ->join('ref_lantai','gedung.id','ref_lantai.id_ref_gedung')
        ->join('ref_ruang','ref_lantai.id','ref_ruang.id_ref_lantai')
        ->join('device','ref_ruang.id','device.id_ref_ruang')
        ->select('device.id','device.status','ref_ruang.ruang','ref_lantai.lantai','gedung.gedung','fakultas.keterangan')
        ->get();
    }

}