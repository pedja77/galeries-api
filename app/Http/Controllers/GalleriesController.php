<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleriesController extends Controller
{
    public function index() {

        $galleries = Gallery::with('firstGalleryItem')->orderBy('id', 'desc')->paginate(10); //orderBy ????

        return $galleries;
    }
}
