<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Cart;
use App\Order;
use App\Stock;
use DB;

class CheckoutController extends Controller
{
    public function index()
    {
        if(!Session::has('cart')){
            return view('cart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $user = Auth::user();
        return view('checkout.index',compact('total','user'));
    }

    public function checkout(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string',
            'phonenumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
          
            'address' => 'required',
            
        ]);
        
        if(!Session::has('cart')){
            return view('cart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        foreach ($cart->items as $order) {
            Stock::where('product_id',$order['product_id'])
                    ->where('name',$order['model'])
                    ->decrement('quantity');
        }
        

        $order = new Order();
        $order->cart = serialize($cart); 
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->phonenumber = $request->input('phonenumber');
        $order->payment = $request->input('payment');
        $order->status = 'Đã đặt hàng';
        
        Auth::user()->orders()->save($order);

        Session::forget('cart');
        return redirect()->route('home.index')->with('success','Mua sản phẩm thành công!');
    }
}