<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \App\Models\Brand;
use \App\Models\Shoe;
use \App\Models\Category;
use \App\Models\Type;
use \App\Models\Stock;

class StocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $stocks = DB::table('stocks')
            ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
            ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
            ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
            ->select('brands.name as brand', 'shoes.name as shoe', 'shoes.sku as sku', 'sizes.us as size', 'stocks as stock', 'shoes.slug as shoe_slug', 'brands.slug as brand_slug')
            ->get();
            //dd($stocks);
        return view('stocks.index', compact('stocks'));
    }
    public function show()
    {
        //show specific shoe stock, pipili ka size,
    }
    public function update()//store -> POST
    {
        //create/update/restore
    }
    public function destroy()
    {
        //softdelete stock
    }
}
