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
}
