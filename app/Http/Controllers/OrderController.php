<?php

namespace App\Http\Controllers;
use App\Order;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('orders.index',compact(['orders']));
    }

    public function changeStatus(Request $request,$id)
    {

        // $order= Order::find($id);
        $new = $request->input('changeStatus');
        // $order->update(['status'=>$new]);

       $order = Order::where('id',$id)->update(['status'=>$new]);

    
        
       return back()->with('success','Chỉnh sửa trạng thái thành công!');
       
    }
}