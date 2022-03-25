<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = [];
    protected $primaryKey='id';
    public function province() {
        return $this->belongsTo(Province::class,'sel_province','id');
    }
    public function district() {
        return $this->belongsTo(District::class,'sel_district','id');
    }
    public function ward() {
        return $this->belongsTo(Ward::class,'sel_ward','id');
    }
    
}
