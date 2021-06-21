<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use \App\Models\Brand;
use \App\Models\Shoe;
use \App\Models\ShoeImage;
use \App\Models\Category;
use \App\Models\Type;

use \App\Rules\ShoeSKU;

class ShoesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
    	return view('shoes.index');
    }
    public function create()
    {
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();
        return view('shoes.create', compact('brands', 'types', 'categories'));
    }
    public function edit(Shoe $shoe)
    {
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();
        return view('shoes.edit', compact('shoe', 'brands', 'types', 'categories'));
    }
    public function show(Shoe $shoe)
    {
        
        $brand = Brand::where('brand_id', $shoe->brand_id)->value('name');
        $shoeImages = ShoeImage::where('shoe_id', $shoe->shoe_id)
            ->orderBy('image_angle_id', 'ASC')
            ->get();
        $type = Type::where('type_id', $shoe->type_id)->value('type');
        $category = Category::where('category_id', $shoe->category_id)->value('category');

        //$url = secure_url(Str::slug($brand,'-').'/'.Str::slug($shoe->name,'-').'/'.Str::replace(' ', '-',$shoe->sku));
        //dd($url);
        return view('shoes.show', compact('shoe', 'brand', 'shoeImages', 'type', 'category'));
    }
    public function view()
    {
        $brands = Brand::with(['shoes' => function ($query) {
                    $query->orderBy('created_at', 'DESC');}, 
                    'shoes.shoeImages' => function ($query) {
                    $query->where('image_angle_id', '1')->pluck('image');},
                ])
            ->orderBy('name', 'ASC')
            ->get();
        return view('shoes.view', compact('brands'));

    }
    public function destroy(Shoe $shoe)
    {
        $shoe->delete($shoe);
        return redirect()->route('shoes.view');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'category' => 'required|exists:categories,category_id',
            'brand' => 'required|exists:brands,brand_id',
            'type' => 'required|exists:types,type_id', 
            'sku' => 'required|unique:shoes,sku',
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
        ])->shoe_id;

        return redirect()->route('shoes.show',['shoe' => $shoe_id]);
    }
    public function update(Shoe $shoe)
    {
        $data = request()->validate([
            'name' => 'required',
            'category' => 'required|exists:categories,category_id',
            'brand' => 'required|exists:brands,brand_id',
            'type' => 'required|exists:types,type_id',
            'sku' => ['required', new ShoeSKU($shoe->shoe_id)],
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
        ];
        $shoe->update($shoe_data);
        return redirect()->route('shoes.show',['shoe' => $shoe->shoe_id]);
    }
}
