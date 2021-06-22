<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use \App\Models\Brand;

use Intervention\Image\Facades\Image;

class BrandsController extends Controller
{
        // *missing: EDIT, UPDATE, DESTROY*
        // *possible feature: update logo, instead of deleting and re-adding
    public function index()
    {
    	$brands = Brand::all();
        return view('brands.index', compact('brands'));
    }
    public function create()
    {
        $this->middleware('auth');
        return view('brands.create');
    }
    public function store()
    {
        $this->middleware('auth');
        $data = request()->validate([
            'name' => 'required|regex:/^[\w\-\s]+$/|unique:brands,name|min:2|max:255',
            'logo' => 'required|image|file|mimes:png,jpg,svg|max:2048',
        ]);
        if(request('logo'))
        {
            $logoPath = request('logo')->store('uploads/logo','public');
            $image = Image::make(public_path("storage/{$logoPath}"));
            $image->save();

            if(
            Brand::create([
                'name' => $data['name'],
                'logo' => $logoPath,
                'slug' => Str::replace(' ', '-', $data['name']),])
            )
            {
                return redirect()->route('brand.index');
            }//Todo db errorhandling
            else
                abort(404);
        }
        
    }
    public function show($brand_slug)
    {
        $brand = Brand::where('slug', $brand_slug)->first();
        return view('brands.show', compact('brand'));
    }
    

}
