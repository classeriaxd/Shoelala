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
        ->join('shoes','cart.shoe_id','=','shoes.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('shoes.*','cart.id as cart_id','cart.quantity as cart_quantity')
        //->sum(DB::raw('shoes.price * cart.quantity'));
        ->get();
        $numOfOrders= $orders=DB::table('cart')
        ->join('shoes','cart.shoe_id','=','shoes.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('shoes.*','cart.id as cart_id','cart.quantity as cart_quantity')
       ->sum('cart.quantity');
        $checkoutPrice= $orders=DB::table('cart')
        ->join('shoes','cart.shoe_id','=','shoes.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('shoes.*','cart.id as cart_id','cart.quantity as cart_quantity')
        ->sum(DB::raw('shoes.price * cart.quantity'));
        $size= $orders=DB::table('cart')
        ->join('shoes','cart.shoe_id','=','shoes.shoe_id')
        ->where('cart.user_id',$user_id)
        ->join('sizes','cart.size_id','=','sizes.size_id')
        ->select('sizes.us as size_id','sizes.eur as size_id2','sizes.uk as size_id3','sizes.cm as size_id4')
        ->get();
        $userID=DB::table('cart')
        ->join('shoes','cart.shoe_id','=','shoes.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('cart.user_id as cart_user_id')
       ->first();
        return view('order',['orderTable'=>$orderTable,'numOfOrders'=>$numOfOrders,'checkoutPrice'=>$checkoutPrice,'size'=>$size,'userID'=>$userID]);
    }

    public function orderSuccess()
    {
        $current_date = Carbon::now()->format('Y-m-d');
        $current_date_string=Carbon::parse($current_date);
        $daysToAdd = 7;
        $pickup_date = $current_date_string->addDays($daysToAdd);
        $user_id=Auth::user()->user_id;
        Order::create([
            'user_id' => Auth::user()->user_id,
            'order_date' => $current_date,
            'pickup_date' => $pickup_date,
            'status'=> '1',
        ]);

        /*OrderItem::create([
            'user_id' => Auth::user()->user_id,
            'order_date' => $current_date,
            'pickup_date' => $pickup_date,
            'status'=> '1',
        ]);*/

        /*OrderItem::create([
            'order_id' => Auth::user()->user_id,
            'stock_id' => $current_date,
            'quantity' => $pickup_date,
        ]);*/
        
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
