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
    public function order_products() {
        return $this->hasMany(Order_products::class,'id_order','id');
    }
    public function status_product() {
        return $this->hasMany(Status_product::class,'status','id');
    }
   
    public function getTrungTamPP() {
        return $this->hasMany(TrungTamPP::class, 'id', 'trungtam_pp');
    }

}
