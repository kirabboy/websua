<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'product_category';
    protected $primaryKey='id';
    public function products() {
        return $this->hasMany(Product::class,'product_category_id','id');
    }
}
