<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use \App\Models\Shoe;
use \App\Models\ShoeImage;

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
        return view('shoeimages.create', compact('shoe'));
    }
    public function store(Shoe $shoe)
    {
        $data = request()->validate([
            'angle' => ['required', Rule::in([1, 2, 3, 4, 5, 6])],
            'shoe_image' => 'required|image|file|max:2048',
        ]);
        if(request('shoe_image'))
        {
            $shoeImagePath = request('shoe_image')->store('uploads/shoeImages','public');
            $image = Image::make(public_path("storage/{$shoeImagePath}"));
            // insert proper sizing, sizes, reso
            $image->save();

            ShoeImage::create([
                'shoe_id' => $shoe->id,
                'image' => $shoeImagePath,
                'angle' => $data['angle'],
            ]);
        }
        return redirect()->route('shoeimage.home', $shoe);
    }
}
