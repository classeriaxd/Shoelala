<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use \App\Models\Shoe;
use \App\Models\ShoeImage;
use \App\Models\ImageAngle;

use Intervention\Image\Facades\Image;

class ShoeImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($brand_slug, $shoe_slug)
    {
        $image_angles = ImageAngle::all();
        return view('shoeimages.create', compact('brand_slug', 'shoe_slug', 'image_angles'));
    }
    public function store($brand_slug, $shoe_slug)
    {
        $data = request()->validate([
            'angle' => 'required|exists:image_angles,image_angle_id',
            'shoe_image' => 'required|image|file|max:2048',
        ]);
        if(request('shoe_image'))
        {
            $shoeImagePath = request('shoe_image')->store('uploads/shoeImages','public');
            $image = Image::make(public_path("storage/{$shoeImagePath}"));
            // insert proper sizing, sizes, reso
            $image->save();
            $shoe = Shoe::where('slug', $shoe_slug)->first();
            if (ShoeImage::create([
                'shoe_id' => $shoe->shoe_id,
                'image' => $shoeImagePath,
                'image_angle_id' => $data['angle'],])
                )
            {
                return redirect()->route('shoes.show', ['brand_slug' => $brand_slug, 'shoe_slug' => $shoe_slug]);
            }
            //TODO db error handling
            else
                abort(404);
        }
    }
}
