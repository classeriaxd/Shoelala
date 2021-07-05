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

use \App\Rules\ShoeSKU;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $req)
    {
        /*$data = request()->validate([
            'user_id' => 'required|numeric|exists:cart,user_id',
            'shoe_id' => 'required|numeric|exists:cart,shoe_id',
            'size_id' => 'required|numeric|exists:cart,size_id',
            'quantity' => 'required|numeric|exists:cart,quantity'
        ]);
        Cart::create([
                'user_id' => $data[Auth::user()->user_id],
                'shoe_id' => $data[request('shoe_id')],
                'size_id' => $data['1'],
                'quantity'=> $data['2'],
        ]);
        */
        /*Cart::create([
            'user_id' => Auth::user()->user_id,
            'stock_id' => request('stock_id'),
            'quantity'=> request('cart_quantity'),
        ]);*/
        /*$add = Cart::firstOrCreate(
            [
                'user_id'           => $add->Auth::user()->user_id,
                'stock_id'          => $add->request('stock_id'),
            ],
            [
                'user_id'            => $add->Auth::user()->user_id,
                'stock_id'             => $add->request('stock_id'),
                'quantity'             =>$add-> request('cart_quantity'),
            ]
        );*/
        if (Cart::where('user_id', Auth::user()->user_id)->exists()) {
            if (Cart::where('stock_id', request('stock_id'))->exists()) { 
                 //abort(404);
                 $cartlist=DB::table('cart')
                ->join('stocks','stocks.stock_id','=','cart.stock_id')
                ->join('sizes','sizes.size_id','=','stocks.size_id')
                ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
                ->where('cart.stock_id',request('stock_id'))
                ->where('cart.user_id',Auth::user()->user_id)
                ->update(['cart.quantity'=> request('cart_quantity')]);
                }
                else{
                    Cart::create([
                        'user_id' => Auth::user()->user_id,
                        'stock_id' => request('stock_id'),
                        'quantity'=> request('cart_quantity'),
                    ]);
            }
        }
        return back();
    }

    static public function cartItem()
    {
        if (Auth::check())
        {
            $user_id=Auth::user()->user_id;
        return Cart::where('user_id',$user_id)->count();
        }
        
        
    }
    
    public function cartlist()
    {
        $user_id=Auth::user()->user_id;
        $cartlist=DB::table('cart')
        ->join('stocks','stocks.stock_id','=','cart.stock_id')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('cart.user_id',$user_id)
        
        //->where('cart.size_id','=','sizes.user_id')
        ->select('shoes.shoe_id','shoes.name','shoes.sku','shoes.price as shoe_price','cart.id as cart_id','cart.quantity as cart_quantity',
        'sizes.us as size_id','sizes.eur as size_id2','sizes.uk as size_id3','sizes.cm as size_id4')
        ->get();
        

        return view('cartlist',['cartlist'=>$cartlist]);
        //return redirect()->route('cartlist.show',['cartlist'=>$cartlist]);
    }
    
    public function removeFromCart($id)
    {
        /*$user_id=Auth::user()->user_id;
        $cartlist=DB::table('cart')
        ->join('shoes','cart.shoe_id','=','shoes.shoe_id')
        ->where('cart.user_id',$user_id)
        ->select('shoes.*','cart.id as cart_id','cart.quantity as cart_quantity')
        ->get();
        $cart_id=$cartlist->cart_id;
        $removeFromCart = Cart::where('cart.id', $cart_id)->first();
        if ($removeFromCart->delete())
        {
            return redirect()->route('cart.cartlist');
        }
        else    
            abort(404);*/
        Cart::destroy($id);
        return redirect('/c/cartlist');
    }

    /*public function order()
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
        ->join('sizes','shoes.type_id','=','sizes.type_id')
        ->where('sizes.type_id',$type_id)
        ->select('sizes.us as size_id','sizes.eur as size_id2','sizes.uk as size_id3','sizes.cm as size_id4')
        ->get();

        return view('order',['orderTable'=>$orderTable,'numOfOrders'=>$numOfOrders,'checkoutPrice'=>$checkoutPrice,'size'=>$size]);
    }*/

    /*public function orderSuccess()
    {
        $user_id=Auth::user()->user_id;
        Orders::create([
            'user_id' => Auth::user()->user_id,
            'shoe_id' => request('shoe_id'),
            'size_id' => '1',
            'quantity'=> '2',
        ]);
        Cart::destroy($user_id);
        return ("order completed");
    }*/
}
