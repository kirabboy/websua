<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_brand extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'product_brand';
    protected $primaryKey='id';
    public function products() {
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
