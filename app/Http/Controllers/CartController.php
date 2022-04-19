<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Trungtampp;


class CartController extends Controller
{
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
        return back()->with('success',"Đã thêm vào giỏ");
    }
    public function buynow($id)
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
        return redirect('/gio-hang');
    }
    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $trungtam_phanphoi = Trungtampp::all();
        return view('products.cart', 
            compact('carts', 'total', 'subtotal', 'trungtam_phanphoi'));
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