<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $brands = Brand::with(['shoes' => function ($query) {

            $query->orderBy('created_at', 'DESC');}, 
            'shoes.shoeImages' => function ($query) {
            $query->where('image_angle_id', '3')->pluck('image');},])
        ->orderBy('name', 'ASC')
        ->get();
        
    
        return view('shop.index', compact('brands'));
    }

}
