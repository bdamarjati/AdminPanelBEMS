<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'ref_ruang';

    public function scopeGetNextId($query){
        return $query->select('id')->orderByDesc('id')->first();
    }

    public function scopeGetDeviceInfo($query){
        return $query->join('device','ref_ruang.id','device.id_ref_ruang')
        ->select('device.id','device.id_ref_ruang','device.status','ref_ruang.ruang')
        ->get();
    }
    
}
