<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rule;

use \App\Models\Order;

use Carbon\Carbon;

class ReportsController extends Controller
{
    public function order_report_index()
    {
    	return view('reports.orderReportIndex');
    }
    public function show_order_report()
    {
        if(Auth::check() && Auth::user()->role->name == 'Super Admin')
        {
            $choices = ['first', 'second', 'third', 'fourth', 'custom'];
            if(request('first'))
            {
                $data = request()->validate([
                    'first' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear();
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('second'))
            {
                $data = request()->validate([
                    'second' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(1);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('third'))
            {
                $data = request()->validate([
                    'third' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(2);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('fourth'))
            {
                $data = request()->validate([
                    'fourth' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(3);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('custom'))
            {
                $data = request()->validate([
                    'custom' => Rule::in($choices),
                    'start_date' => 'required|date',
                    'end_date' => 'required|date|after:start_date',
                ]);
                $start = $data['start_date'];
                $end = $data['end_date'];
            }
            else
                abort(404);
            // Query Orders within the Start and End date
            $pendingOrders = DB::table('orders')
                ->join('users', 'users.user_id', '=', 'orders.user_id')
                ->where('orders.status', '1')
                ->where('orders.order_date', '>=', $start)
                ->where('orders.order_date', '<=', $end)
                ->select(DB::raw('CONCAT(users.last_name, ", ", users.first_name) as user_fullName'),
                    'orders.order_date as order_date',)
                ->get();
            $completedOrders = DB::table('orders')
                ->join('users as buyers', 'buyers.user_id', '=', 'orders.user_id')
                ->join('users as recievers', 'recievers.user_id', '=', 'orders.completed_by')
                ->where('orders.status', '2')
                ->where('orders.completed_date', '>=', $start)
                ->where('orders.completed_date', '<=', $end)
                ->select(DB::raw('CONCAT(buyers.last_name, ", ", buyers.first_name) as buyer_fullName'),
                    'orders.completed_date as completed_date',
                    DB::raw('CONCAT(recievers.last_name, ", ", recievers.first_name) as reciever_fullName'),)
                ->get();
            $cancelledOrders = DB::table('orders')
                ->join('users', 'users.user_id', '=', 'orders.user_id')
                ->where('orders.status', '3')
                ->where('orders.completed_date', '>=', $start)
                ->where('orders.completed_date', '<=', $end)
                ->select(DB::raw('CONCAT(users.last_name, ", ", users.first_name) as user_fullName'),
                    'orders.completed_date as cancel_date',)
                ->get();
            $expiredOrders = DB::table('orders')
                ->join('users as buyers', 'buyers.user_id', '=', 'orders.user_id')
                ->join('users as tagger', 'tagger.user_id', '=', 'orders.completed_by')
                ->where('orders.status', '4')
                ->where('orders.completed_date', '>=', $start)
                ->where('orders.completed_date', '<=', $end)
                ->select(DB::raw('CONCAT(buyers.last_name, ", ", buyers.first_name) as buyer_fullName'),
                    'orders.completed_date as tag_date',
                    DB::raw('CONCAT(tagger.last_name, ", ", tagger.first_name) as tagger_fullName'),)
                ->get();
            $startDate = Carbon::parse($start)->format('F d, Y');
            $endDate = Carbon::parse($end)->format('F d, Y');
            
            return view('reports.showOrderReport', compact('pendingOrders', 'completedOrders', 'cancelledOrders', 'expiredOrders', 'startDate', 'endDate'));
        }
        else
            abort(403);
    }
  
    public function users_report_verified_index()
    {
    	return view('reports.usersReportVerifiedIndex');
    }

    public function show_users_verified_report()
    {
        if(Auth::check() && Auth::user()->role->name == 'Super Admin')
        {
            $choices = ['first', 'second', 'third', 'fourth', 'custom'];
            if(request('first'))
            {
                $data = request()->validate([
                    'first' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear();
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('second'))
            {
                $data = request()->validate([
                    'second' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(1);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('third'))
            {
                $data = request()->validate([
                    'third' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(2);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('fourth'))
            {
                $data = request()->validate([
                    'fourth' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(3);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('custom'))
            {
                $data = request()->validate([
                    'custom' => Rule::in($choices),
                    'start_date' => 'required|date',
                    'end_date' => 'required|date|after:start_date',
                ]);
                $start = $data['start_date'];
                $end = $data['end_date'];
            }
            else
                abort(404);
            // Query Date of Verified Users within the Start and End date
            $verifiedUsers = DB::table('users')
                ->whereNotNull('email_verified_at')
                ->where('users.email_verified_at', '>=', $start)
                ->where('users.email_verified_at', '<=', $end)
                ->select(DB::raw('CONCAT(users.last_name, ", ", users.first_name) as user_fullName'),
                    'users.email_verified_at as verified_date',)
                ->get();
            $startDate = Carbon::parse($start)->format('F d, Y');
            $endDate = Carbon::parse($end)->format('F d, Y');
            return view('reports.showVerifiedUsers', compact('verifiedUsers', 'startDate', 'endDate'));
        }
        else
            abort(404);
    }
  
    public function users_report_not_verified_index()
    {
    	return view('reports.usersReportNotVerifiedUsersIndex');
    }

    public function show_users_not_verified_report()
    {
        if(Auth::check() && Auth::user()->role->name == 'Super Admin')
        {
            $choices = ['first', 'second', 'third', 'fourth', 'custom'];
            if(request('first'))
            {
                $data = request()->validate([
                    'first' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear();
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('second'))
            {
                $data = request()->validate([
                    'second' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(1);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('third'))
            {
                $data = request()->validate([
                    'third' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(2);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('fourth'))
            {
                $data = request()->validate([
                    'fourth' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(3);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('custom'))
            {
                $data = request()->validate([
                    'custom' => Rule::in($choices),
                    'start_date' => 'required|date',
                    'end_date' => 'required|date|after:start_date',
                ]);
                $start = $data['start_date'];
                $end = $data['end_date'];
            }
            else
                abort(404);
            // Query Date of Verified Users within the Start and End date
            $notVerifiedUsers = DB::table('users')
                ->whereNull('email_verified_at')
                ->where('users.created_at', '>=', $start)
                ->where('users.created_at', '<=', $end)
                ->select(DB::raw('CONCAT(users.last_name, ", ", users.first_name) as user_fullName'),
                    'users.created_at as created_date',)
                ->get();
            $startDate = Carbon::parse($start)->format('F d, Y');
            $endDate = Carbon::parse($end)->format('F d, Y');
            return view('reports.showNotVerifiedUsers', compact('notVerifiedUsers', 'startDate', 'endDate'));
        }
        else
            abort(404);
    }

    public function users_report_purchasers_index()
    {
    	return view('reports.usersReportPurchasersIndex');
    }

    public function show_users_purchasers_report()
    {
        if(Auth::check() && Auth::user()->role->name == 'Super Admin')
        {
            $choices = ['first', 'second', 'third', 'fourth', 'custom'];
            if(request('first'))
            {
                $data = request()->validate([
                    'first' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear();
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('second'))
            {
                $data = request()->validate([
                    'second' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(1);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('third'))
            {
                $data = request()->validate([
                    'third' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(2);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('fourth'))
            {
                $data = request()->validate([
                    'fourth' => Rule::in($choices),
                ]);
                $date = Carbon::now()->startOfYear()->addQuarter(3);
                $start = $date->firstOfQuarter();;
                $end = Carbon::parse($start)->copy()->endOfQuarter();
            }
            else if(request('custom'))
            {
                $data = request()->validate([
                    'custom' => Rule::in($choices),
                    'start_date' => 'required|date',
                    'end_date' => 'required|date|after:start_date',
                ]);
                $start = $data['start_date'];
                $end = $data['end_date'];
            }
            else
                abort(404);
            // Query Date of Verified Users within the Start and End date
            $purchasers = DB::table('orders')
                ->join('users as buyers', 'buyers.user_id', '=', 'orders.user_id')
                ->join('order_items','order_items.order_id','=','orders.order_id')
                ->join('stocks','stocks.stock_id','=','order_items.stock_id')
                ->join('sizes','sizes.size_id','=','stocks.size_id')
                ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
                ->where('orders.status', '2')
                ->where('orders.completed_date', '>=', $start)
                ->where('orders.completed_date', '<=', $end)
                ->select(DB::raw('CONCAT(buyers.last_name, ", ", buyers.first_name) as user_fullName'),
                DB::raw('shoes.price * order_items.quantity as amount'),'orders.order_id as order_id')
                ->orderBy('amount','DESC')
                ->get();
            $startDate = Carbon::parse($start)->format('F d, Y');
            $endDate = Carbon::parse($end)->format('F d, Y');
            return view('reports.showPurchasersUsers', compact('purchasers', 'startDate', 'endDate'));
        }
        else
            abort(404);

    public function stock_report_index()
    {
    	return view('reports.stockReportIndex');
    }
    public function show_stock_report()
    {
        if(Auth::check() && Auth::user()->role->name == 'Super Admin')
        {
            $choices = ['no', 'low', 'high', 'all'];
            if(request('no'))
            {
                $data = request()->validate([
                    'no' => Rule::in($choices),
                ]);
                $NoStocks = DB::table('shoes')
                ->leftJoin('stocks', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                ->whereNull('stocks.shoe_id')
                ->get();
                return view('reports.showNoStockReport', compact('NoStocks'));
            }
            else if(request('low'))
            {
                $data = request()->validate([
                    'low' => Rule::in($choices),
                ]);

                $TotalStocks = DB::table('stocks')
                ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
                ->select('shoes.name as shoe', 'shoes.sku as sku', DB::raw('sum(stocks.stocks) as stock'), 'shoes.shoe_id as shoe_id')
                ->whereNull('stocks.deleted_at')
                ->groupBy('stocks.shoe_id')
                ->havingRaw('sum(stocks.stocks) < 100')
                ->orderBy('shoes.name', 'ASC')
                ->get();
                
                $LowStocks = DB::table('stocks')
                ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
                ->join('types', 'types.type_id', '=', 'sizes.type_id')
                ->select('shoes.name as shoe', 'types.type as type', 'sizes.us as size', 'stocks.stocks as stock', 'stocks.shoe_id as shoe_id')
                //->whereRaw('stocks.stocks < 100')
                ->whereNull('stocks.deleted_at')
                ->orderBy('sizes.size_id', 'ASC')
                ->get();

                return view('reports.showLowStockReport', compact('LowStocks', 'TotalStocks'));
            }
            else if(request('high'))
            {
                $data = request()->validate([
                    'high' => Rule::in($choices),
                ]);
                $TotalStocks = DB::table('stocks')
                ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
                ->select('shoes.name as shoe', 'shoes.sku as sku', DB::raw('sum(stocks.stocks) as stock'), 'shoes.shoe_id as shoe_id')
                ->whereNull('stocks.deleted_at')
                ->groupBy('stocks.shoe_id')
                ->havingRaw('sum(stocks.stocks) >= 100')
                ->orderBy('shoes.name', 'ASC')
                ->get();
                
                $HighStocks = DB::table('stocks')
                ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
                ->join('types', 'types.type_id', '=', 'sizes.type_id')
                ->select('shoes.name as shoe', 'types.type as type', 'sizes.us as size', 'stocks.stocks as stock', 'stocks.shoe_id as shoe_id')
                //->whereRaw('stocks.stocks < 100')
                ->whereNull('stocks.deleted_at')
                ->orderBy('sizes.size_id', 'ASC')
                ->get();

                return view('reports.showHighStockReport', compact('HighStocks', 'TotalStocks'));
            }
            else if(request('all'))
            {
                $data = request()->validate([
                    'all' => Rule::in($choices),
                ]);
                $NoStocks = DB::table('shoes')
                ->leftJoin('stocks', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                ->whereNull('stocks.shoe_id')
                ->get();

                $TotalLowStocks = DB::table('stocks')
                ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
                ->select('shoes.name as shoe', 'shoes.sku as sku', DB::raw('sum(stocks.stocks) as stock'), 'shoes.shoe_id as shoe_id')
                ->whereNull('stocks.deleted_at')
                ->groupBy('stocks.shoe_id')
                ->havingRaw('sum(stocks.stocks) < 100')
                ->orderBy('shoes.name', 'ASC')
                ->get();
                
                $LowStocks = DB::table('stocks')
                ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
                ->join('types', 'types.type_id', '=', 'sizes.type_id')
                ->select('shoes.name as shoe', 'types.type as type', 'sizes.us as size', 'stocks.stocks as stock', 'stocks.shoe_id as shoe_id')
                //->whereRaw('stocks.stocks < 100')
                ->whereNull('stocks.deleted_at')
                ->orderBy('sizes.size_id', 'ASC')
                ->get();       
                
                $TotalHighStocks = DB::table('stocks')
                ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
                ->select('shoes.name as shoe', 'shoes.sku as sku', DB::raw('sum(stocks.stocks) as stock'), 'shoes.shoe_id as shoe_id')
                ->whereNull('stocks.deleted_at')
                ->groupBy('stocks.shoe_id')
                ->havingRaw('sum(stocks.stocks) >= 100')
                ->orderBy('shoes.name', 'ASC')
                ->get();
                
                $HighStocks = DB::table('stocks')
                ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
                ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
                ->join('types', 'types.type_id', '=', 'sizes.type_id')
                ->select('shoes.name as shoe', 'types.type as type', 'sizes.us as size', 'stocks.stocks as stock', 'stocks.shoe_id as shoe_id')
                //->whereRaw('stocks.stocks < 100')
                ->whereNull('stocks.deleted_at')
                ->orderBy('sizes.size_id', 'ASC')
                ->get();
                return view('reports.showStockReport', compact('NoStocks','TotalLowStocks', 'LowStocks', 'TotalHighStocks', 'HighStocks'));
            }
            else
                abort(404);
        }
        else
            abort(403);
    }
}
