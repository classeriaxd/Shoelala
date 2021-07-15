<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use Auth;
use \App\Models\Brand;
use \App\Models\Shoe;
use \App\Models\ShoeImage;
use \App\Models\Category;
use \App\Models\Type;
use \App\Models\Cart;
use \App\Models\User;
use \App\Models\Order;

use \App\Rules\ShoeSKU;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id=Auth::user()->user_id;
        $cartlist=DB::table('cart')
        ->join('stocks','stocks.stock_id','=','cart.stock_id')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('shoes.shoe_id','shoes.name','shoes.sku','shoes.price as shoe_price','cart.id as cart_id','cart.quantity as cart_quantity',
        'sizes.us as size_id','sizes.eur as size_id2','sizes.uk as size_id3','sizes.cm as size_id4')
        ->get();
        

        $pendingOrders=DB::table('orders')
        ->where('orders.user_id',$user_id)
        ->where('orders.status',1)
        ->select('orders.order_uuid')
        ->get();  


        $completedOrders=DB::table('orders')
        ->where('orders.user_id',$user_id)
        ->where('orders.status',2)
        ->select('orders.order_uuid')
        ->get();  

        $cancelledOrders=DB::table('orders')
        ->where('orders.user_id',$user_id)
        ->where('orders.status',3)
        ->select('orders.order_uuid')
        ->get();  

        $expiredOrders=DB::table('orders')
        ->where('orders.user_id',$user_id)
        ->where('orders.status',4)
        ->select('orders.order_uuid')
        ->get();  

        return view('home',compact('cartlist','pendingOrders','completedOrders','cancelledOrders','expiredOrders'));
    }

    public static function cartCount(){
        if (Auth::check())
        {
            $user_id=Auth::user()->user_id;
        return Cart::where('user_id',$user_id)->count();
        }
    }

    public static function pendingCount(){
        if (Auth::check())
        {
            $user_id=Auth::user()->user_id;
            $conditions=[
                ['status','=','1'],
                ['user_id','=',$user_id],
            ];
            return Order::where($conditions)->count();
        }
    }

    public static function completedCount(){
        if (Auth::check())
        {
            $user_id=Auth::user()->user_id;
            $conditions=[
                ['status','=','2'],
                ['user_id','=',$user_id],
            ];
            return Order::where($conditions)->count();
        }
    }

    public static function cancelledCount(){
        if (Auth::check())
        {
            $user_id=Auth::user()->user_id;
            $conditions=[
                ['status','=','3'],
                ['user_id','=',$user_id],
            ];
            return Order::where($conditions)->count();
        }
    }

    public static function expiredCount(){
        if (Auth::check())
        {
            $user_id=Auth::user()->user_id;
            $conditions=[
                ['status','=','4'],
                ['user_id','=',$user_id],
            ];
            return Order::where($conditions)->count();
        }
    }
}
