<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
