<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }
    public function scanQRView()
    {
        $instascanJS = true;
        return view('orders.scanView', compact('instascanJS'));
    }
    public function show($order_uuid)
    {
        if(Order::where('order_uuid', $order_uuid)->exists())
        {
            $userDetails = DB::table('orders')
                    ->join('users','users.user_id', '=', 'orders.user_id')
                    ->where('orders.order_uuid', $order_uuid)
                    ->select('orders.order_uuid as order_uuid', 
                            DB::raw('CONCAT(users.last_name, ", ", users.first_name, " ", users.middle_name) as user_fullName'),
                            'orders.order_date as order_date',
                            'orders.pickup_date as pickup_date',
                            'orders.status as status',
                        )->first();
            $orderItems = DB::table('orders')
                    ->join('order_items', 'order_items.order_id', '=', 'orders.order_id')
                    ->join('stocks', 'stocks.stock_id', '=', 'order_items.stock_id')
                    ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                    ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
                    ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
                    ->where('orders.order_uuid', $order_uuid)
                    ->select('shoes.name as shoe_name',
                            'brands.name as brand_name',
                            'sizes.us as size_us',
                            'order_items.quantity as quantity',
                            'shoes.price as unit_price',
                            DB::raw('order_items.quantity * shoes.price as subtotal'))
                    ->get();
            $totalAmount = DB::table('orders')
                    ->join('order_items', 'order_items.order_id', '=', 'orders.order_id')
                    ->join('stocks', 'stocks.stock_id', '=', 'order_items.stock_id')
                    ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                    ->where('orders.order_uuid', $order_uuid)
                    ->sum(DB::raw('order_items.quantity * shoes.price'));
                    //->sum('quantity * unit_price');

            //dd($userDetails, $orderItems, $totalAmount);
                            
            return view('orders.show', compact('userDetails', 'orderItems', 'totalAmount'));
        }
        else
            abort(404);
    }
    public function complete_order($order_uuid)
    {
        if(Order::where('order_uuid', $order_uuid)->exists())
        {
            $order = Order::where('order_uuid', $order_uuid)->first();
            $order->status = '2';
            $order->save();
            return redirect()->route('orders.show',['order_uuid' => $order_uuid,]);
        }
        else
            abort(403);
    }
}
