<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\delivery;
use session;

class CartController extends Controller
{
    public function show() {
        $cart = session()->get('cart', []);
        return view('cart.show', compact('cart'));
    }
    public function addToCart($id) {
        $product = Product::find($id);
        $cart = session()->get('cart');
        
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully');
    }
    public function updateCart(Request $request, $id) {
        $cart = session()->get('cart');
        
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->input('quantity');
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated successfully');
    }

    public function deleteCart($id) {
        $cart = session()->get('cart');
        
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        return redirect()->back()->with('success', 'Item removed from cart successfully');
    }
//----- delivery-----//

    public function checkout(){
        return view('user.checkout');
    }

    public function delivery($id){
        $products = Product::find($id);
        return view('user.delivery', compact('products'));
    }
    public function deliveryCart($id){
        $productCarts = Product::find($id);
        return view('user.delivery-show', compact('productCarts'));
    }

    public function storeDevilery(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
        ]);
        delivery::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'type' => 1,
            
        ]);
        return redirect('/checkout');
    }

}
