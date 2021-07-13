<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;

use \App\Models\Brand;
use \App\Models\Shoe;
use \App\Models\Stock;
use \App\Models\Size;
use \App\Models\Category;
use \App\Models\Type;

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
        $type = Type::all();
        $category = Category::all();

        $shoe =  DB::table('shoes')
            ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
            ->join('shoe_images', 'shoe_images.shoe_id', '=', 'shoes.shoe_id')
            ->select('shoes.name as shoes', 'shoes.shoe_id as shoe_id', 'brands.name as brand',
            'brands.brand_id as brand_id','shoes.description as description', 
            'shoe_images.image_angle_id as image_angle_id', 'shoes.price as price', 'shoe_images.image as image', 'shoes.slug as shoeslug' , 'brands.slug as brandslug')
            ->where('image_angle_id', '3')
            ->orderBy('shoes.name', 'ASC')
            ->get();
        
        if(Request::get('filterbrand')&&Request::get('filtercategory')&&Request::get('filtertype')){
            $filbrand = $_GET['filterbrand'];
            $filcategory = $_GET['filtercategory'];
            $filtertype = $_GET['filtertype'];
            $shoe =  DB::table('shoes')
            ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
            ->join('shoe_images', 'shoe_images.shoe_id', '=', 'shoes.shoe_id')
            ->select('shoes.name as shoes', 'shoes.shoe_id as shoe_id', 'brands.name as brand',
            'brands.brand_id as brand_id','shoes.description as description', 
            'shoe_images.image_angle_id as image_angle_id', 'shoes.price as price', 
            'shoe_images.image as image')
            ->where('image_angle_id', '3')
            ->whereIn('shoes.category_id', $filcategory)
            ->whereIn('shoes.brand_id', $filbrand)
            ->whereIn('shoes.type_id', $filtertype)
            ->orderBy('shoes.name', 'ASC')
            ->get();
        }
        elseif(Request::get('filterbrand')&&Request::get('filtercategory')){
            $filbrand = $_GET['filterbrand'];
            $filcategory = $_GET['filtercategory'];
    
            $shoe =  DB::table('shoes')
            ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
            ->join('shoe_images', 'shoe_images.shoe_id', '=', 'shoes.shoe_id')
            ->select('shoes.name as shoes', 'shoes.shoe_id as shoe_id', 'brands.name as brand',
            'brands.brand_id as brand_id','shoes.description as description', 
            'shoe_images.image_angle_id as image_angle_id', 'shoes.price as price', 
            'shoe_images.image as image')
            ->where('image_angle_id', '3')
            ->whereIn('shoes.category_id', $filcategory)
            ->whereIn('shoes.brand_id', $filbrand)
            ->orderBy('shoes.name', 'ASC')
            ->get();
        }
        elseif(Request::get('filterbrand')&&Request::get('filtertype')){
            $filbrand = $_GET['filterbrand'];
            $filtertype = $_GET['filtertype'];
    
            $shoe =  DB::table('shoes')
            ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
            ->join('shoe_images', 'shoe_images.shoe_id', '=', 'shoes.shoe_id')
            ->select('shoes.name as shoes', 'shoes.shoe_id as shoe_id', 'brands.name as brand',
            'brands.brand_id as brand_id','shoes.description as description', 
            'shoe_images.image_angle_id as image_angle_id', 'shoes.price as price', 
            'shoe_images.image as image')
            ->where('image_angle_id', '3')
            ->whereIn('shoes.type_id', $filtertype)
            ->whereIn('shoes.brand_id', $filbrand)
            ->orderBy('shoes.name', 'ASC')
            ->get();
        }
        elseif(Request::get('filtercategory')&&Request::get('filtertype')){
            $filcategory = $_GET['filtercategory'];
            $filtertype = $_GET['filtertype'];
    
            $shoe =  DB::table('shoes')
            ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
            ->join('shoe_images', 'shoe_images.shoe_id', '=', 'shoes.shoe_id')
            ->select('shoes.name as shoes', 'shoes.shoe_id as shoe_id', 'brands.name as brand',
            'brands.brand_id as brand_id','shoes.description as description', 
            'shoe_images.image_angle_id as image_angle_id', 'shoes.price as price', 
            'shoe_images.image as image')
            ->where('image_angle_id', '3')
            ->whereIn('shoes.type_id', $filtertype)
            ->whereIn('shoes.category_id', $filcategory)
            ->orderBy('shoes.name', 'ASC')
            ->get();
        }
        elseif(Request::get('filtercategory')){
            $filcategory = $_GET['filtercategory'];
            
            $shoe =  DB::table('shoes')
            ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
            ->join('shoe_images', 'shoe_images.shoe_id', '=', 'shoes.shoe_id')
            ->select('shoes.name as shoes', 'shoes.shoe_id as shoe_id', 'brands.name as brand',
            'brands.brand_id as brand_id','shoes.description as description', 
            'shoe_images.image_angle_id as image_angle_id', 'shoes.price as price', 
            'shoe_images.image as image')
            ->whereIn('shoes.category_id', $filcategory)
            ->where('image_angle_id', '3')
            ->orderBy('shoes.name', 'ASC')
            ->get();
        }
        elseif(Request::get('filterbrand')){
            $filbrand = $_GET['filterbrand'];
            $shoe =  DB::table('shoes')
            ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
            ->join('shoe_images', 'shoe_images.shoe_id', '=', 'shoes.shoe_id')
            ->select('shoes.name as shoes', 'shoes.shoe_id as shoe_id', 'brands.name as brand',
            'brands.brand_id as brand_id','shoes.description as description', 
            'shoe_images.image_angle_id as image_angle_id', 'shoes.price as price', 
            'shoe_images.image as image')
            ->where('image_angle_id', '3')
            ->whereIn('shoes.brand_id', $filbrand)
            ->orderBy('shoes.name', 'ASC')
            ->get();
        }
        elseif(Request::get('filtertype')){
            $filtertype = $_GET['filtertype'];
            $shoe =  DB::table('shoes')
            ->join('brands', 'brands.brand_id', '=', 'shoes.brand_id')
            ->join('shoe_images', 'shoe_images.shoe_id', '=', 'shoes.shoe_id')
            ->select('shoes.name as shoes', 'shoes.shoe_id as shoe_id', 'brands.name as brand',
            'brands.brand_id as brand_id','shoes.description as description', 
            'shoe_images.image_angle_id as image_angle_id', 'shoes.price as price', 
            'shoe_images.image as image')
            ->where('image_angle_id', '3')
            ->whereIn('shoes.type_id', $filtertype)
            ->orderBy('shoes.name', 'ASC')
            ->get();
        }
    
        return view('shop.index', compact('brand', 'shoe', 'category', 'type'));
    }

}
