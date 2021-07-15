<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use \App\Models\Brand;
use \App\Models\Shoe;
use \App\Models\ShoeImage;
use \App\Models\Category;
use \App\Models\Type;
use \App\Models\Cart;
use \App\Models\Size;


use \App\Rules\ShoeSKU;

class ShoesController extends Controller
{
    public function index()
    {
        $brands = Brand::with(['shoes' => function ($query) {
                    $query->orderBy('created_at', 'DESC');}, 
                    'shoes.shoeImages' => function ($query) {
                    $query->where('image_angle_id', '1')->pluck('image');},
                ])
            ->orderBy('name', 'ASC')
            ->get();
        return view('shoes.index', compact('brands'));
    }
    public function create()
    {
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();
        return view('shoes.create', compact('brands', 'types', 'categories'));
    }
    public function edit($brand_slug, $shoe_slug)
    {
        $shoe = Shoe::where('slug', $shoe_slug)->first();
        $shoebrandslug = Brand::where('slug', $brand_slug)->value('slug');
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();
        return view('shoes.edit', compact('shoe', 'shoebrandslug', 'brands', 'types', 'categories'));
    }
    public function show($brand_slug, $shoe_slug)
    {
        $shoe = Shoe::where('slug', $shoe_slug)->first();
        $brand = Brand::where('slug', $brand_slug)->first();
        $shoeImages = ShoeImage::where('shoe_id', $shoe->shoe_id)
            ->orderBy('image_angle_id', 'ASC')
            ->get();
        $type = Type::where('type_id', $shoe->type_id)->value('type');
        $category = Category::where('category_id', $shoe->category_id)->value('category');
        $size = DB:: table('sizes')
        ->join('shoes','sizes.type_id','=','shoes.type_id')
        ->where('shoes.shoe_id',$shoe->shoe_id)
        ->select('sizes.us as size_us','sizes.size_id as size_id')
        ->get();
        $stocks=DB::table('stocks')
        ->join('sizes','sizes.size_id','=','stocks.size_id')
        ->join('shoes','shoes.shoe_id','=','stocks.shoe_id')
        ->where('shoes.slug',$shoe_slug)
        ->select('stocks.stock_id','stocks.size_id')
        ->get();
        return view('shoes.show', compact('shoe', 'brand', 'shoeImages', 'type', 'category','size','stocks'));
    }
    public function destroy($brand_slug, $shoe_slug)
    {
        $shoe = Shoe::where('slug', $shoe_slug)->first();
        
        if ($shoe->delete())
            return redirect()->route('shoes.index');
        else
            abort(404);
        
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|regex:/^[\w\-\s]+$/|min:2|max:255',
            'category' => 'required|exists:categories,category_id',
            'brand' => 'required|exists:brands,brand_id',
            'type' => 'required|exists:types,type_id', 
            'sku' => 'required|alpha_dash|unique:shoes,sku',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);
        $shoe_id = Shoe::create([
            'name' => $data['name'],
            'category_id' => $data['category'],
            'brand_id' => $data['brand'],
            'type_id' => $data['type'],
            'sku' => $data['sku'],
            'price' => $data['price'],
            'description' => $data['description'],
            'slug' => Str::replace(' ', '-', $data['name']).'-'.Str::replace(' ', '-', $data['sku']),
        ])->shoe_id;
        // todo: db error handling
        $shoe = Shoe::where('shoe_id', $shoe_id)->first();
        $brand = Brand::where('brand_id', $shoe->brand_id)->first();

        return redirect()->route('shoes.show',['brand_slug' => $brand->slug, 'shoe_slug' => $shoe->slug]);
    }
    public function update($brand_slug, $shoe_slug)
    {
        $data = request()->validate([
            'name' => 'required|regex:/^[\w\-\s]+$/|min:2|max:255',
            'category' => 'required|exists:categories,category_id',
            'brand' => 'required|exists:brands,brand_id',
            'type' => 'required|exists:types,type_id',
            'sku' => ['required','alpha_dash', new ShoeSKU($shoe_slug)],
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);
        $shoe_data = [
            'name' => $data['name'],
            'category_id' => $data['category'],
            'brand_id' => $data['brand'],
            'type_id' => $data['type'],
            'sku' => $data['sku'],
            'price' => $data['price'],
            'description' => $data['description'],
            'slug' => Str::replace(' ', '-', $data['name']).'-'.Str::replace(' ', '-', $data['sku']),
        ];
        $shoe = Shoe::where('slug', $shoe_slug)->first();

        if (Shoe::where('slug', $shoe_slug)->update($shoe_data))
        {
            $shoe = Shoe::where('shoe_id', $shoe->shoe_id)->first();
            $shoe_slug = Shoe::where('slug', $shoe->slug)->value('slug');
            $brand_slug = Brand::where('brand_id', $shoe->brand_id)->value('slug');
            return redirect()->route('shoes.show',['brand_slug' => $brand_slug, 'shoe_slug' => $shoe_slug]);
        }
        // todo: db error handling
        else
            abort(404);
        
    }
    public function detail($shoe_id)
    {
        $data =Shoe::with('shoeImages')->find($shoe_id);
        return view('detail',compact('data'));
    }
    
    public function restore_index()
    {
        $shoes = Shoe::onlyTrashed()->get();

        return view('shoes.restore', compact('shoes'));

    }

    public function restore_shoes($shoe_slug)
    {
        $shoe = Shoe::withTrashed()->where('slug', $shoe_slug)->first();
        if($shoe->restore())
        {
            $shoes = Shoe::onlyTrashed()->get();
            return view('shoes.restore',compact('shoes'));
        }
        else
            abort(404);
    }
}
