<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \App\Models\Brand;
use \App\Models\Shoe;
use \App\Models\Stock;
use \App\Models\Size;

class StocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $this->middleware('auth');
        $stocks = DB::table('stocks')
            ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
            ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
            ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
            ->select('brands.name as brand', 'shoes.name as shoe', 'shoes.sku as sku', DB::raw('sum(stocks.stocks) as stock'), 'shoes.slug as shoe_slug', 'brands.slug as brand_slug')
            //->sum('stocks.stocks')
            ->whereNull('stocks.deleted_at')
            ->groupBy('stocks.shoe_id')
            ->orderBy('stocks.created_at', 'ASC')
            ->get();
            //dd($stocks);
        return view('stocks.index', compact('stocks'));
    }

    public function show($brand_slug, $shoe_slug)
    {
        //show specific shoe stock, pipili ka size,
        $shoe = Shoe::where('slug', $shoe_slug)->first();
        $brand = Brand::where('slug', $brand_slug)->first();
        $stocks = DB::table('stocks')
        ->join('shoes', 'shoes.shoe_id', '=', 'stocks.shoe_id')
        ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
        ->join('types', 'types.type_id', '=', 'sizes.type_id')
        ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
        ->select('brands.name as brand', 'shoes.name as shoe', 'types.type as type', 'sizes.us as size', 'stocks.stocks as stock', 'shoes.slug as shoe_slug', 'brands.slug as brand_slug', 'stocks.size_id as size_id')
        //->sum('stocks.stocks')
        ->where('stocks.shoe_id', $shoe->shoe_id)
        ->whereNull('stocks.deleted_at')
        ->get();
        //dd($stocks);

        return view('stocks.show', compact('shoe', 'brand', 'stocks'));
    }

    public function edit($brand_slug, $shoe_slug, $size_id)
    {
        
        $this->middleware('auth');
        $shoe = Shoe::where('slug', $shoe_slug)->first();
        $brand = Brand::where('slug', $brand_slug)->first();
        $size= DB::table('stocks')
        ->join('sizes', 'sizes.size_id', '=', 'stocks.size_id')
        ->select('sizes.us as size', 'stocks.size_id as size_id')
        ->where('stocks.size_id', $size_id)
        ->first();
        $stocks= DB::table('stocks')
        ->select('stocks.stocks as stock')
        ->where('stocks.size_id', $size_id)
        ->first();
        return view('stocks.edit', compact('shoe', 'brand', 'size', 'stocks'));
    }

    public function destroy($brand_slug, $shoe_slug, $size_id)
    {
        //softdelete stock
        $this->middleware('auth');
        $shoe = Shoe::where('slug', $shoe_slug)->first();
        $stocks = Stock::where(['shoe_id' => $shoe->shoe_id, 'size_id' => $size_id])->first();
        if ($stocks->delete())
        {
            return redirect()->route('stocks.index');
        }
        else
            abort(404);
    }

    public function update($brand_slug, $shoe_slug, $size_id)//store -> POST
    {
        //update
        $this->middleware('auth');
        $data = request()->validate([
            'stocks' => 'required|numeric'
        ]);
        $stock_data = [
            'stocks' => $data['stocks'],
        ];

        if (Stock::where('size_id', $size_id)->update($stock_data))
        {
            return redirect()->route('stocks.show',['brand_slug' => $brand_slug, 'shoe_slug' => $shoe_slug]);
        }
        // todo: db error handling
        else
            abort(404);
    }

    public function create()
    {
        $this->middleware('auth');
        $shoe = Shoe::all();
        $size= DB::table('sizes')
        ->join('types', 'types.type_id', '=', 'sizes.type_id')
        ->select('sizes.us as size', 'sizes.size_id as size_id','sizes.us as us', 'types.type as type')
        ->get();
        return view('stocks.create', compact('shoe', 'size'));
    }
    
    public function store()
    {
        $this->middleware('auth');
        $data = request()->validate([
            'name' => 'required|exists:shoes,shoe_id',
            'size' => 'required|exists:sizes,size_id', 
            'stocks' => 'required|numeric',
        ]);
        
        $stocks = Stock::where(['shoe_id' => $data['name'], 'size_id' => $data['size']])->first();

        if ($stocks !== null) {

            $stocks->increment('stocks', $data['stocks']);
        
        } else {
        
            $stocks = Stock::create([
                'shoe_id' => $data['name'],
                'size_id' => $data['size'],
                'stocks' => $data['stocks']
            ])->stock_id;
        
        }
        
        /*$stock_id = Stock::updateOrCreate(
            [
                'shoe_id' => $data['name'],
                'size_id' => $data['size']
            ],
            ['stocks' => $data['stocks']],
        )->stock_id; */
        // todo: db error handling

        return redirect()->route('stocks.index');
    }
}
