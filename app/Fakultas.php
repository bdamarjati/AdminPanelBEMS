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
        ->join('lantai','gedung.id','lantai.id_ref_gedung')
        ->select('lantai.id','lantai.id_ref_gedung','gedung.gedung','fakultas.keterangan')
		->get();
    }

    public function scopeGetRuangInfo($query){
        return $query->join('gedung','fakultas.id','gedung.id_ref_fakultas')
        ->join('lantai','gedung.id','lantai.id_ref_gedung')
        ->join('ruang','lantai.id','ruang.id_ref_lantai')
        ->select('ruang.id','ruang.id_ref_lantai','ruang.ruang','lantai.lantai','gedung.gedung','fakultas.keterangan')
        ->get();
    }

    public function scopeGetAllDeviceInfo($query){
        return $query->join('gedung','fakultas.id','gedung.id_ref_fakultas')
        ->join('lantai','gedung.id','lantai.id_ref_gedung')
        ->join('ruang','lantai.id','ruang.id_ref_lantai')
        ->join('device','ruang.id','device.id_ref_ruang')
        ->select('device.id','device.status','ruang.ruang','lantai.lantai','gedung.gedung','fakultas.keterangan')
        ->get();
    }

}