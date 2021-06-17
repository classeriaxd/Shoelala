<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use \App\Models\Brand;

use Intervention\Image\Facades\Image;

class BrandsController extends Controller
{
        // *missing: EDIT, UPDATE, DESTROY*
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
    	return view('brands.index');
    }
    public function create()
    {
        return view('brands.create');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|unique:brands,name',
            'logo' => 'required|image|file|max:2048',
        ]);
        if(request('logo'))
        {
            $logoPath = request('logo')->store('uploads/logo','public');
            $image = Image::make(public_path("storage/{$logoPath}"));
            $image->save();

            Brand::create([
                'name' => $data['name'],
                'logo' => $logoPath,
            ]);
        }
        return redirect()->route('brand.view');
    }
    public function view()
    {
        $brands = Brand::all();
        return view('brands.view', compact('brands'));
    }
    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

}
