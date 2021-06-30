<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;

use \App\Models\Brand;
use \App\Models\Shoe;
use \App\Models\Stock;
use \App\Models\Size;

class ShopController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function index()
    {
        //$this->middleware('auth');
        $brand = Brand::all();

        $brands = Brand::with(['shoes' => function ($query) {

            $query->orderBy('created_at', 'DESC');}, 
            'shoes.shoeImages' => function ($query) {
            $query->where('image_angle_id', '3')->pluck('image');},])
        ->orderBy('name', 'ASC')
        ->get();
        
        if(Request::get('filterbrand')){

            $checked = $_GET['filterbrand'];
            $brands = Brand::with(['shoes' => function ($query) {
                $query->orderBy('created_at', 'DESC');}, 
                'shoes.shoeImages' => function ($query) {
                $query->where('image_angle_id', '3')->pluck('image');},])
            ->whereIn('brand_id', $checked)
            ->orderBy('name', 'ASC')
            ->get();
        }
    
        return view('shop.index', compact('brand', 'brands'));
    }

}
