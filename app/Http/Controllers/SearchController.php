<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    // public function getSearch(Request $request)
    // {
    //     return view('searchProduct');
    // }

    function SearchProduct(Request $request)
    {
        $search = $request->input('searchProduct');

    // Search in the title and body columns from the posts table
    $products = Product::query()
        ->where('name', 'LIKE', "%{$search}%")
      
        ->get();

    // Return the search view with the resluts compacted
    return view('search.search', compact('products'));
    }


    function SearchProductBrand(Request $request)
    {
        $search = $request->input('productBrand');
        // $search = $request->all();
        // dd($search);
  
    $products = Product::query()
        ->where('brand', 'LIKE', "%{$search}%")
      
        ->get();


    return view('search.search', compact('products'));
    }
}