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
        if (Cart::where('user_id', Auth::user()->user_id)->exists()) {//kung may userid
            if (Cart::where('stock_id', request('stock_id'))->exists()) { //kung andun na ung same stockid or size
                 //abort(404);
                 $checkStocks=DB::table('stocks')
                    ->where('stocks.stock_id',request('stock_id'))
                    ->select('stocks.stocks as stocksLeft')
                    ->first();
                 if($checkStocks->stocksLeft>=request('cart_quantity'))//check kung mas malaki ung stocks sa updated quantity,update
                    {
                        $cartQuantity=DB::table('cart')
                            ->join('stocks','stocks.stock_id','=','cart.stock_id')
                            ->join('sizes','sizes.size_id','=','stocks.size_id')
                            ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
                            ->where('cart.stock_id',request('stock_id'))
                            ->where('cart.user_id',Auth::user()->user_id)
                            ->select('cart.quantity as cart_quantity')
                            ->first();
                        $cartlist=DB::table('cart')
                            ->join('stocks','stocks.stock_id','=','cart.stock_id')
                            ->join('sizes','sizes.size_id','=','stocks.size_id')
                            ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
                            ->where('cart.stock_id',request('stock_id'))
                            ->where('cart.user_id',Auth::user()->user_id)
                            ->update(['cart.quantity'=>$cartQuantity->cart_quantity+request('cart_quantity')]);
                        return back();
                    }
                    else{//kung indi mas malaki ung quantity, error
                        abort(404);
                    }
                }
                else{ //kung wala man ung stocks pero andun na si user bali same user nag order lang different shoe, proceed to check quantity
                    $checkStocks=DB::table('stocks')
                    ->where('stocks.stock_id',request('stock_id'))
                    ->select('stocks.stocks as stocksLeft')
                    ->first();
                    if($checkStocks->stocksLeft>=request('cart_quantity'))//kung kasya ung quantity na ininput sa stocks left, create
                    {
                        Cart::create([
                            'user_id' => Auth::user()->user_id,
                            'stock_id' => request('stock_id'),
                            'quantity'=> request('cart_quantity'),
                        ]);
                        return back();     
                    }
                    else{//kung hindi kasya, error
                        abort(404);
                }
                    
            }
               
        }
        else{//kung wala dun ung user id (parang new acc ung logic neto),proceed
                $checkStocks=DB::table('stocks')
                    ->where('stocks.stock_id',request('stock_id'))
                    ->select('stocks.stocks as stocksLeft')
                    ->first();
                 if($checkStocks->stocksLeft>=request('cart_quantity'))//check kung mas malaki ung stocks sa updated quantity,update
                    {
                        Cart::create([
                            'user_id' => Auth::user()->user_id,
                            'stock_id' => request('stock_id'),
                            'quantity'=> request('cart_quantity'),
                        ]);
                        return back(); 
                    }
                    else{//kung indi mas malaki ung quantity, error
                        abort(404);
                    }

        }
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
        ->select('shoes.shoe_id','shoes.name','shoes.sku','shoes.price as shoe_price','cart.id as cart_id','cart.quantity as cart_quantity',
        'sizes.us as size_id','sizes.eur as size_id2','sizes.uk as size_id3','sizes.cm as size_id4')
        ->get();
        
        $cartcount=Cart::where('user_id',$user_id)->count();

        return view('carts.cartlist',compact('cartlist','cartcount'));
    }
    
    public function removeFromCart($id)
    {
        Cart::destroy($id);
        return redirect('/c/cartlist');
    }
}
