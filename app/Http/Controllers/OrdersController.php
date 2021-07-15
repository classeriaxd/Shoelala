<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class OrdersController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->role->name == 'Super Admin')
        {
            $pendingOrders = DB::table('orders')
                ->join('users','orders.user_id','=','users.user_id')
                ->select(DB::raw('CONCAT(users.last_name, ", ", users.first_name, " ", users.middle_name) as buyer_fullName'),
                    'orders.order_date as order_date',
                    'orders.pickup_date as pickup_date',)
                ->where('orders.status','1')
                ->orderBy('orders.order_date', 'DESC')
                ->get();
            $completedOrders = DB::table('orders')
                ->join('users as buyers','orders.user_id','=','buyers.user_id')
                ->join('users as recievers', 'orders.completed_by', '=', 'recievers.user_id')
                ->select(DB::raw('CONCAT(buyers.last_name, ", ", buyers.first_name, " ", buyers.middle_name) as buyer_fullName'),
                    'orders.order_date as order_date',
                    DB::raw('CONCAT(recievers.last_name, ", ", recievers.first_name) as reciever_fullName'),
                    'orders.completed_date as completed_date',)
                ->where('orders.status','2')
                ->orderBy('orders.completed_date', 'DESC')
                ->get();
            $cancelledOrders = DB::table('orders')
                ->join('users','orders.user_id','=','users.user_id')
                ->select(DB::raw('CONCAT(users.last_name, ", ", users.first_name, " ", users.middle_name) as buyer_fullName'),
                    'orders.order_date as order_date',
                    'orders.completed_date as cancel_date',)
                ->where('orders.status','3')
                ->orderBy('orders.order_date', 'DESC')
                ->get();
            $expiredOrders = DB::table('orders')
                ->join('users as buyers','orders.user_id','=','buyers.user_id')
                ->join('users as recievers', 'orders.completed_by', '=', 'recievers.user_id')
                ->select(DB::raw('CONCAT(buyers.last_name, ", ", buyers.first_name, " ", buyers.middle_name) as buyer_fullName'),
                    'orders.order_date as order_date',
                    DB::raw('CONCAT(recievers.last_name, ", ", recievers.first_name) as reciever_fullName'),
                    'orders.completed_date as completed_date')
                ->where('orders.status','4')
                ->orderBy('orders.completed_date', 'DESC')
                ->get();
            return view('orders.index', compact('pendingOrders', 'completedOrders', 'cancelledOrders', 'expiredOrders'));
        }
        else if(Auth::check() && Auth::user()->role->name == 'Admin')
        {
            $pendingOrders = DB::table('orders')
                ->join('users','orders.user_id','=','users.user_id')
                ->select(DB::raw('CONCAT(users.last_name, ", ", users.first_name, " ", users.middle_name) as buyer_fullName'),
                    'orders.order_date as order_date',
                    'orders.pickup_date as pickup_date',)
                ->where('orders.status','1')
                ->where('orders.pickup_date', '>=', Carbon::now())
                ->where('orders.pickup_date', '<=', Carbon::now()->addDays(8))
                ->orderBy('orders.order_date', 'DESC')
                ->get();
            return view('orders.index', compact('pendingOrders'));
        }
        else
            abort(404);

        
    }
    public function scanQRView()
    {
        $instascanJS = true;
        return view('orders.scanView', compact('instascanJS'));
    }
    public function scanQR()
    {
        $expired_orders = DB::table('orders')
                    ->join('users', 'users.user_id', '=', 'orders.user_id')
                    ->where(DB::raw('DATEDIFF(CURRENT_DATE(), orders.pickup_date)'), '>', '0')
                    ->where('orders.status', '1')
                    ->select('orders.order_uuid as order_uuid', 
                        DB::raw('DATEDIFF(CURRENT_DATE(), orders.pickup_date) as days_late'),
                        DB::raw('CONCAT(users.last_name, ", ", users.first_name, " ", users.middle_name) as user_fullName'),
                        'orders.pickup_date as pickup_date',)
                    ->get();
        return view('orders.showExpired', compact('expired_orders'));
    }
    public function tag_expired_order($order_uuid)
    {
        if(Order::where('order_uuid', $order_uuid)->exists())
        {
            $order = Order::where('order_uuid',$order_uuid)->first();
            $order->status='4';
            $order->completed_date = date('Y-m-d H:i:s');
            $order->completed_by = Auth::user()->user_id;
            $order->save();
            $order_items=DB::table('orders')
            ->join('order_items','order_items.order_id','=','orders.order_id')
            ->join('stocks','stocks.stock_id','=','order_items.stock_id')
            ->where('orders.order_uuid',$order_uuid)
            ->select('stocks.stock_id as stock_id','order_items.quantity as quantity')
            ->get();
            foreach ($order_items as $order_item)
            {
                $stock=Stock::where('stock_id',$order_item->stock_id)->first();
                $stock->stocks+=$order_item->quantity;
                $stock->save();
            }
            return redirect()->route('expired_orders.show');
        }
        else
            abort(404);
    }
    public function tag_all_expired_orders()
    {
        $expired_orders = DB::table('orders')
                    ->where(DB::raw('DATEDIFF(CURRENT_DATE(), orders.pickup_date)'), '>', '0')
                    ->where('orders.status', '1')
                    ->select('orders.order_id as order_id',)
                    ->get();
        foreach($expired_orders as $expired_order)
        {
            $order = Order::where('order_id', $expired_order->order_id)->first();
            $order->status='4';
            $order->completed_date = date('Y-m-d H:i:s');
            $order->completed_by = Auth::user()->user_id;
            $order->save();
            $order_items=DB::table('orders')
            ->join('order_items','order_items.order_id','=','orders.order_id')
            ->join('stocks','stocks.stock_id','=','order_items.stock_id')
            ->where('orders.order_id',$expired_order->order_id)
            ->select('stocks.stock_id as stock_id','order_items.quantity as quantity')
            ->get();
            foreach ($order_items as $order_item)
            {
                $stock=Stock::where('stock_id',$order_item->stock_id)->first();
                $stock->stocks+=$order_item->quantity;
                $stock->save();
            }
        }
        return redirect()->route('expired_orders.show');
    }
}
