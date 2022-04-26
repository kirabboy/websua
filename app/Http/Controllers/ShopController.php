<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    public function show($id){
        $product =Product::findOrFail($id);
        return view('products.product-detail',compact('product'));
    }
}
