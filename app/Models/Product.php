<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'price',
        'description'
    ];
    protected $primary='id';
    public function product_brand() {
        return $this->hasOne(Product_brand::class,'brand_id','id');
    }
    public function product_category() {
        return $this->belongsTo(Product_category::class,'product_category_id','id');
    }
    public function get_products(){
        return $this->hasMany(Order_products::class,'id_product','id');
    }
}

 