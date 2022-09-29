<?php

namespace App\Http\Controllers;

use App;
use App\Product;
use App\Stock;
use App\Cart;
use Illuminate\Http\Request;
use DB;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->where('brand','like',"%ASUS%")->get();
        // $genders = Product::select('gender')->groupBy('gender')->get();
        $brands = Product::select('brand')->where('brand','like',"%ASUS%")->get();
        $configs = Product::select('config')->groupBy('config')->get();
    

        return view('products.index',compact(['brands','configs','products']));
        
    }

   



    public function filter(Request $request)
    {
        
        
        if($request->ajax())
        {
            $products= Product::where('quantity','>',0);
            $query = json_decode($request->get('query'));
            $price = json_decode($request->get('price'));
            // $gender = json_decode($request->get('gender'));
            $brand = json_decode($request->get('brand'));
            
            if(!empty($query))
            {
                $products= $products->where('name','like','%'.$query.'%');        
            }
            if(!empty($price))
            {
                $products= $products->where('price','<=',$price);
            }
            
            if(!empty($brand))
            {
                $products= $products->whereIn('brand',$brand);
            }
            $products=$products->get();
            

            $total_row = $products->count();
            if($total_row>0)
            {
                $output ='';
                foreach($products as $product)
                {
                    $output .='
                    <div class="col-lg-4 col-md-6 col-sm-12 pt-3">
                        <div class="card">
                            <a href="product/'.$product->id.'">
                                <div class="card-body ">
                                    <div class="product-info">
                                    
                                    <div class="info-1"><img src="'.asset('/storage/'.$product->image).'" alt=""></div>
                                    <div class="info-2"><h4>'.$product->name.'</h4></div>
                                    <div class="info-4"><h5>'.$product->brand.'</h5></div>
                                    
                                    <div class="info-3"><h5>'.$product->price.' vnđ</h5></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    ';
                }
            }
            else
            {
                $output='
                <div class="col-lg-4 col-md-6 col-sm-6 pt-3">
                    <h4>Không có sản phẩm</h4>
                </div>
                ';
            }
            $data = array(
                'table_data'    =>$output
            );
            echo json_encode($data);
        
        }
    }
    

    public function brand(Request $request)
    {
        // return redirect()->route('product.index');
        if($request->ajax())
        {
            
            $query = json_decode($request->get('query'));
            $price = json_decode($request->get('price'));
            // $gender = json_decode($request->get('gender'));
            $brand =  $products->where('brand','like','%ASUS%');
            if(!empty($query))
            {
                $products= $products->where('name','like','%'.$query.'%');        
            }
            if(!empty($price))
            {
                $products= $products->where('price','<=',$price);
            }
            
            if(!empty($brand))
            {
                $products= $products->whereIn('brand',$brand);
            }
            $products=$products->get();
            

            $total_row = $products->count();
            if($total_row>0)
            {
                $output ='';
                foreach($products as $product)
                {
                    $output .='
                    <div class="col-lg-4 col-md-6 col-sm-12 pt-3">
                        <div class="card">
                            <a href="product/'.$product->id.'">
                                <div class="card-body ">
                                    <div class="product-info">
                                    
                                    <div class="info-1"><img src="'.asset('/storage/'.$product->image).'" alt=""></div>
                                    <div class="info-2"><h4>'.$product->name.'</h4></div>
                                    <div class="info-4"><h5>'.$product->brand.'</h5></div>
                                    
                                    <div class="info-3"><h5>'.$product->price.' vnđ</h5></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    ';
                }
            }
            else
            {
                $output='
                <div class="col-lg-4 col-md-6 col-sm-6 pt-3">
                    <h4>Không có sản phẩm</h4>
                </div>
                ';
            }
            $data = array(
                'table_data'    =>$output
            );
            echo json_encode($data);
        
        }

        
    }

    



    public function show(Product $product)
    {   
        $product = Stock::where('product_id','=',$product->id)
                     ->get([
                            'name',
                            'quantity',
                        ]);

        return view('products.show', compact ('product',));
    }
    




    public function form()
    {
        return view('admin.addproduct');
    }

    public function create(Request $request)
    {
        $this->validate(request(),[
            'image'=>'required|image',
            'name'=>'required|string',
            'brand'=>'required|in:ASUS,DELL,MSI,HP,APPLE,ACER',
            'price'=>'required|integer',
            'insurance'=>'required',
            'config'=>'required',
        ]);
       
        $imagepath = $request->image->store('products','public');
        
        $product = new Product();
        $product->name=request('name');
        $product->brand=request('brand');
        $product->price=request('price');
        $product->insurance=request('insurance');
        $product->config=request('config');
        $product->image=$imagepath;

        

        $product->save();
        // DB:: table('products')->insert($product);
    
        return redirect()->route('admin.product')->with('success','Thêm sản phẩm thành công!');
    }
    
    public function editform($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.editproduct',compact('product'));
    }

    public function edit(Request $request,$id)
    {
        $this->validate(request(),[
            'image'=>'',
            'name'=>'required|string',
            'brand'=>'required|in:ASUS,DELL,MSI,HP,APPLE,ACER',
            'price'=>'required|integer',
            'insurance'=>'required',
            
            // 'gender'=>'required|in:Male,Female,Unisex',
            'config'=>'required',
        ]);
        if(request('image'))
        {
            $imagepath = $request->image->store('products','public');
            $product = Product::findOrFail($id);
            
            $product->name=request('name');
            $product->brand=request('brand');
            $product->price=request('price');
            // $product->gender=request('gender');
            $product->insurance=request('insurance');
            $product->config=request('config');
            $product->image=$imagepath;
            $product->save();
        }
        else
        {
            $product = Product::findOrFail($id);
            $product->name=request('name');
            $product->brand=request('brand');
            $product->price=request('price');
            // $product->gender=request('gender');
            $product->insurance=request('insurance');
            $product->config=request('config');
            $product->save();
        }
        return redirect()->route('admin.product')->with('success','Sửa sản phẩm thành công!');
        
    }
    
    public function remove($id)
    {
        Product::where('id',$id)->delete();
        Stock::where('product_id',$id)->delete();

        return redirect()->route('admin.product')->with('success','Xóa sản phẩm thành công!');
    }

    public function list()
    {
        $products = Product::orderBy('id')->get();
        //dd($products);
        return view('admin.product', compact ('products'));
    }


}