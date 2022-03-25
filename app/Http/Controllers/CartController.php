<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function add($id)
    {
        $product = Product::findOrFail($id);
        Cart::add(
            [
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'image' => $product->image,
                ],

            ]
        );
        // dd(Cart::content());
        return back();
    }
    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('products.cart', compact('carts', 'total', 'subtotal'));
    }
    public function delete($rowId)
    {
        Cart::remove($rowId);
        return back();
    }
    public function destroy()
    {
        Cart::destroy();
        return back();
    }
    public function update(Request $request)
    {
        if ($request->ajax()) {
            Cart::update($request->rowId, $request->qty);
        }
    }
}
