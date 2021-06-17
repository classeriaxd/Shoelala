<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use \App\Models\Brand;
use \App\Models\Shoe;
use \App\Models\ShoeImage;

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
        return view('shoes.create', compact('brands'));
    }
    public function edit(Shoe $shoe)
    {
        $brands = Brand::all();
        return view('shoes.edit', compact('shoe', 'brands'));
    }
    public function show(Shoe $shoe)
    {
        $brand = Brand::where('id', $shoe->brand)->value('name');
        $shoeImages = ShoeImage::where('shoe_id', $shoe->id)
        ->orderBy('angle', 'ASC')
        ->get();
        return view('shoes.show', compact('shoe', 'brand', 'shoeImages'));
    }
    public function view()
    {
        $brands = Brand::with(['shoes' => function ($query) {
                    $query->orderBy('created_at', 'DESC');}, 
                    'shoes.shoeImages' => function ($query) {
                    $query->where('angle', '1')->pluck('image');},
                ])
            ->orderBy('name', 'ASC')
            ->get();
        //dd($brands);
        return view('shoes.view', compact('brands'));

    }
    public function destroy(Shoe $shoe)
    {
        $shoe->delete($shoe);
        return redirect()->route('shoes.home');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'brand' => 'required|numeric|exists:Brands,id',
            'category' => ['required', Rule::in([1])], //insert exists: shoe_categories table
            'sku' => 'required|unique:Shoes,sku',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'type' => ['required', Rule::in([1, 2, 3])], //insert exists: shoe_types table
        ]);
        // insert db validation
        $shoe_id = Shoe::create([
            'name' => $data['name'],
            'brand' => $data['brand'],
            'category' => $data['category'],
            'sku' => $data['sku'],
            'price' => $data['price'],
            'description' => $data['description'],
            'type' => $data['type'],
        ])->id;
        return redirect()->route('shoes.show',['shoe' => $shoe_id]);
    }
    public function update(Shoe $shoe)
    {
        $data = request()->validate([
            'name' => 'required',
            'brand' => 'required|numeric|exists:Brands,id',
            'category' => ['required', Rule::in([1])], //insert exists: shoe_categories table
            'sku' => ['required', new ShoeSKU($shoe->id)],
            'price' => 'required|numeric',
            'description' => 'nullable',
            'type' => ['required', Rule::in([1, 2, 3])], //insert exists: shoe_types table
        ]);
        $shoe->update($data);
        return redirect()->route('shoes.show',['shoe' => $shoe->id]);
    }
}
