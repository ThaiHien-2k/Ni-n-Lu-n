<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::take(4)->get();
        return view('home.index',compact('products'));
        
    }
    public function random()
     
    {
        $products = Product::orderByRaw('RAND()')->take(4)->get();
        return view('home.index',compact('products'));
        
    }


}