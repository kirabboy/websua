<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_products extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'order_products';
    protected $primaryKey='id';
    public function orders() {
        return $this->belongsTo(Order::class,'id_order','id');
    }
    public function get_products() {
        return $this->belongsTo(Product::class,'id_product','id');
    }
  
}
