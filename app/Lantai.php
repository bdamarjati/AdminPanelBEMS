<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'lantai';

    public function scopeGetNextId($query){
        return $query->select('id')->orderByDesc('id')->first();
    }
    
}
