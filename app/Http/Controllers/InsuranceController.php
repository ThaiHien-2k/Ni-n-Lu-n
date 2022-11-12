<?php

namespace App\Http\Controllers;

use App\Insurance;
use App\Order;
use App\Laptop;
use App\Product;
use App\InsuranceDetail;
use Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = DB::select('select DISTINCT serial,order_id,phone from insurances');
        $orders = Order::get();
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        
        
        return view('admin.insurance',compact('insurances','orders'));
        
    }

    
    public function chooseLaptop()
    {
        $laptops = Laptop::get()->all();
        $orders = Order::get();
      
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        // return view('orders.index',compact(['orders']));
        return view('admin.chooseLaptop',compact('orders','laptops'));
    }


    public function addForm($id)
    {

        $laptops=Laptop::where('serial','=',$id)->get();
        $orders = Order::get();
        $serial = $id;
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        $name = Laptop::where('serial','=',$id)->get('productName')->first()->productName;
        $monthAdd = Product::where('name',$name)->get('insurance')->first()->insurance;

        $dateInsurance=Laptop::where('serial','=',$id)->get('dateInsurance')->first()->dateInsurance;
        $status= strtotime(now())-strtotime('+'.$monthAdd.' month',strtotime($dateInsurance));
        $statuss= strtotime(now())-strtotime('+'.$monthAdd.' month',strtotime($dateInsurance));
        // $status=$monthAdd;
        $dateEnd=date( "d-m-Y",strtotime('+'.$monthAdd.' month',strtotime($dateInsurance)));
        if($status <0){
            $status='Còn bảo hành đến ngày '.$dateEnd;
        }
        else{

            $status='Hết hạn bảo hành ngày '.$dateEnd;
        }

        return view('admin.addInsurance',compact('laptops','orders','serial','status','statuss'));
    }
    
    public function addInsurance($id,$status)
    {
       
        if($status<0){
        $insurance = new Insurance();
        
        $insurance->order_id=Laptop::where('serial','=',$id)->get()->first()->order_id;
        $insurance->serial=$id;
        $insurance->body=request('body');
        $insurance->nameStaff=request('nameStaff');
        $insurance->cost=request('cost');
        $insurance->phone=Laptop::where('serial','=',$id)->get()->first()->phone;
        $insurance->dateTake=now();
        $insurance->save();


        // $insurances = DB::select('select DISTINCT serial,order_id,phone from insurances');
        // $orders = Order::get();
        // $orders->transform(function($order,$key){
        //     $order->cart = unserialize($order->cart);
        //     return $order;
        // });
        
        return redirect()->route('insurance.detail', ['id' => $id])->with('success','Thêm bảo hành thành công!');}
        else{
            return back()->with('success','Đã hết hạn bảo hành!');
        }
        // return view('admin.insurance',compact('insurances','orders'))->with('success','Thêm bảo hành thành công!');
        
    }

    public function view($id)
    {

        // dd($request);
        $totalCost  = Insurance::where('serial','=',$id)->sum('cost');
        $serial = $id;
        $insurances = Insurance::where('serial','=',$id)->get();
        $orders = Order::get();
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
       


        $name = Laptop::where('serial','=',$id)->get('productName')->first()->productName;
        $monthAdd = Product::where('name',$name)->get('insurance')->first()->insurance;

        $dateInsurance=Laptop::where('serial','=',$id)->get('dateInsurance')->first()->dateInsurance;
        $status= strtotime(now())-strtotime('+'.$monthAdd.' month',strtotime($dateInsurance));
        // $status=$monthAdd;
        $dateEnd=date( "d-m-Y",strtotime('+'.$monthAdd.' month',strtotime($dateInsurance)));
        if($status <0){
            $status='Còn bảo hành đến ngày '.$dateEnd;
        }
        else{

            $status='Hết hạn bảo hành ngày '.$dateEnd;
        }

       
        $count = Insurance::where('serial','=',$id)->count();
        return view('admin.viewInsurance',compact('insurances','orders','serial','count','totalCost','status' ));
        
    }



    public function edit(Request $request, $id)
    {
      
        $insurances = new Insurance();
        $insurances=Insurance::findOrFail($id);
        $insurances->body=request('body');
        $insurances->nameStaff=request('nameStaff');
        $insurances->cost=request('cost');
       
        $insurances->save();
        $serial = Insurance::where('id', '=',$id)->value('serial');
        
        return redirect()->route('insurance.detail', ['id' => $serial])->with('success','Chỉnh sửa bảo hành thành công!');
      
    }

    public function editForm($id)
    {
        $insurance=Insurance::where('id',$id)->get()->first();
        // dd( $insurance);
        return view('admin.editInsurance',compact('insurance'));
    }


    public function removeInsurance($id)
    {
        Insurance::where('id','=',$id)->delete();
        
        return back()->with('success','Xóa bảo hành thành công!');
    }

 
    //Laptop serial

    public function serial($id,$model)
    {
        $nameModel=$model;
        $orders = Order::where('id','=',$id)->get();
      
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);

            return $order;
        });
        
        return view('admin.addlaptop',compact('orders','nameModel'));
    }

    public function serialAdd($id,$model)
 {   
    
        
        $orders = Order::where('id','=',$id)->get();

        $laptop = new Laptop();
        $laptop->order_id=$id;

        $laptop->serial=request('serial');
        $laptop->model=$model;
        $laptop->productName=request('productName');
        $laptop->nameOwner=Order::where('id','=',$id)->get('name')->first()->name;
        $laptop->phone=Order::where('id','=',$id)->get('phonenumber')->first()->phonenumber;
   
        if(request('dateInsurance') == 'on')
        $laptop->dateInsurance=now();
        else 
        $laptop->dateInsurance= null;
        Laptop::where('serial','=',null)->delete();
        $laptops=Laptop::get('serial');
        if (Laptop::where('serial', '=', $laptop->serial)->exists()) {
            return back()->with('success','serial đã tồn tại!');
        }
        else{ $laptop->save();
       
       
            return redirect()->route('admin.showorder', ['id' => $id])->with('success','lưu serial thành công!');
     
        // return view('admin.laptop',compact('orders'));
    }
    }

    public function laptop()
    {

        $laptops = Laptop::get()->all();
        $orders = Order::get();
      
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('admin.viewLaptopSerial',compact('laptops','orders'));
        
    }

    public function remove($id)
    {
        Laptop::where('serial','=',$id)->delete();
        $laptops = Laptop::get()->all();
        $orders = Order::get();
      
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return back()->with('success','Xóa serial thành công!');
    }

    public function serialEditForm($id)
 {   
   
        $laptops=Laptop::where('serial','=',$id)->get();
        // $serial=$laptops->serial;
        // dd( $laptops);
        
        return view('admin.editLaptop',compact('laptops'));


    }

    public function serialEdit(Request $request, $id)
    {
       
        $laptop=Laptop::findOrFail($id);
        $laptop->serial=request('serial');
        $laptop->dateInsurance=request('dateInsurance');
        $laptop->save();

        $laptops = Laptop::get()->all();
        $orders = Order::get();
      
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('admin.viewLaptopSerial',compact('laptops','orders'))->with('success','Sửa serial thành công!');
        
    }

    function searchSerial(Request $request)
    {
        $search = $request->input('searchSerial');

    
    $laptops = Laptop::query()
        ->where('phone', 'LIKE', "%{$search}%")
      
        ->get();

  
        $orders = Order::get();
      
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('admin.viewLaptopSerial',compact('laptops','orders'));
    }

    
    function searchInsurance(Request $request)
    {
        $search = $request->input('searchInsurance');

    
        $insurances =Insurance::query()->where('phone', 'LIKE', "%{$search}%")
      
        ->get();
        $orders = Order::get();
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('admin.insurance',compact('insurances','orders'));
    }


    // insuranceDetail
    public function viewInsuranceDetail($id,$time)
    {
        $insurances = Insurance::where('id',$id)->get();
        $insuranceDetails = InsuranceDetail::where('insurance_id',$id)->get();
        return view('admin.viewInsuranceDetail',compact('insurances','insuranceDetails','time'));
        
    }

    public function addDetailForm($id,$time)
    {
        $insurances = Insurance::where('id',$id)->get()->first();
        if($insurances->status=='Đã giao'){
            return back()->with('success','Đã trả máy!');
        }
        else{
        return view('admin.addInsuranceDetail',compact('insurances','id','time'));}
        
    } 

    public function create(Request $request)
    {
               
        $imagepath = $request->image->store('insurances','public');
        
        $insuranceDetail = new InsuranceDetail();
       
        $insuranceDetail->fix=request('fix');
        $insuranceDetail->insurance_id=request('id');
        $insuranceDetail->date=request('date');
      
    
        $insuranceDetail->image=$imagepath;
        $insuranceDetail->save();
        $insurances = Insurance::where('id',$insuranceDetail->insurance_id)-> update(['status'=>'Đang sửa chữa']);
       
        $time=request('time');
    
        return redirect()->route('insurance.viewDetail', ['id' => $insuranceDetail->insurance_id,'time'=>$time])->with('success','Thêm chi tiết thành công!');
    }

    public function removeInsuranceDetail($id)
    {
        InsuranceDetail::where('id','=',$id)->delete();
      
       
        return back()->with('success','Xóa chi tiết thành công!');
    }
    
}