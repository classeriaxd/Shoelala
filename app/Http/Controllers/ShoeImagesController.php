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
    public function index(Shoe $shoe)
    {
        return view('shoeimages.index', compact('shoe'));
    }
    public function create(Shoe $shoe)
    {
        $image_angles = ImageAngle::all();
        return view('shoeimages.create', compact('shoe', 'image_angles'));
    }
    public function store(Shoe $shoe)
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

            ShoeImage::create([
                'shoe_id' => $shoe->shoe_id,
                'image' => $shoeImagePath,
                'image_angle_id' => $data['angle'],
            ]);
        }
        return redirect()->route('shoeimage.home', $shoe);
    }
}
