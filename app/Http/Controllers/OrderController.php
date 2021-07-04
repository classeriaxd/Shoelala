<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Auth;
use Carbon\Carbon;
use \App\Models\Brand;
use \App\Models\Shoe;
use \App\Models\ShoeImage;
use \App\Models\Category;
use \App\Models\Type;
use \App\Models\Cart;
use \App\Models\User;
use \App\Models\Order;
use \App\Models\OrderItem;

use \App\Rules\ShoeSKU;
use Session;

class OrderController extends Controller
{

    public function order()
    {
        $user_id=Auth::user()->user_id;
        $orderTable= $orders=DB::table('cart')
        ->join('stocks','stocks.stock_id','=','cart.stock_id')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('shoes.shoe_id','shoes.name','shoes.sku','shoes.price as shoe_price','cart.id as cart_id','cart.quantity as cart_quantity',
        'sizes.us as size_id','sizes.eur as size_id2','sizes.uk as size_id3','sizes.cm as size_id4')
        ->get();
        $numOfOrders= $orders=DB::table('cart')
        ->join('stocks','stocks.stock_id','=','cart.stock_id')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('cart.quantity as cart_quantity')
        ->sum('cart.quantity');
        $checkoutPrice= $orders=DB::table('cart')
        ->join('stocks','stocks.stock_id','=','cart.stock_id')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('shoes.price as shoe_price','cart.id as cart_id','cart.quantity as cart_quantity')
        ->sum(DB::raw('shoes.price * cart.quantity'));
        
        $userID=DB::table('cart')
        ->join('stocks','stocks.stock_id','=','cart.stock_id')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('cart.user_id as cart_user_id')
        ->first();
       /*$stocks=DB::table('stocks')
        ->join('cart','stocks.shoe_id','=','cart.shoe_id')
        ->where('stocks.size_id','cart.size_id')
        ->select('cart.size_id as cart_size_id','cart.shoe_id as cart_shoe_id','cart.quantity as cart_quantity')
       ->get();*/
        return view('order',['orderTable'=>$orderTable,'numOfOrders'=>$numOfOrders,'checkoutPrice'=>$checkoutPrice,'userID'=>$userID]);
    }

    public function orderSuccess(Request $req)
    {
        $current_date = Carbon::now()->format('Y-m-d');
        $current_date_string=Carbon::parse($current_date);
        $daysToAdd = 7;
        $pickup_date = $current_date_string->addDays($daysToAdd);
        $user_id=Auth::user()->user_id;
        $orderId=Order::create([
            'user_id' => Auth::user()->user_id,
            'order_date' => $current_date,
            'pickup_date' => $pickup_date,
            'status'=> '1',
        ])->order_id;

        /*OrderItem::create([
            'user_id' => Auth::user()->user_id,
            'order_date' => $current_date,
            'pickup_date' => $pickup_date,
            'status'=> '1',
        ]);*/
        $cartItems=DB::table('cart')
        ->join('stocks','stocks.stock_id','=','cart.stock_id')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('cart.stock_id as cart_stock_id','cart.quantity as cart_quantity')
        ->get();
        /*$stock_id=DB::table('cart')
        ->join('stocks','stocks.stock_id','=','cart.stock_id')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('stocks.stock_id')
        ->get();
        $quantity=DB::table('cart')
        ->join('stocks','stocks.stock_id','=','cart.stock_id')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('cart.quantity')
        ->get();*/
        foreach($cartItems as $cartItem)
        {
            OrderItem::create([
                'order_id'=> $orderId,
                'stock_id' => $cartItem->cart_stock_id,
                'quantity'=> $cartItem->cart_quantity,
            ]);
        }
        

        
        return $this->subtractFromStocks();
    }
    
    /*public function addToOrderItems(Request $req)
    {
        $orderItem=DB::table('cart')
        ->join('stocks','cart.size_id','=','stocks.shoe_id')
        ->where('cart.shoe_id',request('shoe_id'))
        ->select('cart.*')
       ->get();
        //return view('order',['orderItem'=>$orderItem]);

        
        return $this->deleteCartRecords();
    }*/
    public function subtractFromStocks(){
        $user_id=Auth::user()->user_id;
        $cartItems=DB::table('cart')
        ->join('stocks','stocks.stock_id','=','cart.stock_id')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('cart.stock_id as cart_stock_id','cart.quantity as cart_quantity','stocks.stocks as stocks_quantity','shoes.shoe_id as shoes_shoe_id')
        ->get();
        
        //$cartItems->decrement('stocks',$cartItems['cart_quantity']);
        foreach($cartItems as $cartItem)
        {
            $stocks=DB::table('cart')
            ->join('stocks','stocks.stock_id','=','cart.stock_id')
            ->join('sizes','sizes.size_id','=','stocks.size_id')
            ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
            ->where('cart.user_id',$user_id)
            ->where('stocks.shoe_id',$cartItem->shoes_shoe_id)
            ->update(['stocks.stocks'=> $cartItem->stocks_quantity - $cartItem->cart_quantity]);
        }
        


        return $this->deleteCartRecords();
        
    }

    public function deleteCartRecords()
    {
        $user_id=Auth::user()->user_id;
        $del=DB::table('cart')
        ->where('cart.user_id',$user_id)
        ->delete();

        return redirect()->route('home');
        
    }

    
}
