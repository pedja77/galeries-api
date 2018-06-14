<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleriesController extends Controller
{
    public function index() {

        $galleries = Gallery::with(['firstGalleryItem', 'user:id,first_name,last_name'])
            ->orderBy('id', 'desc')
            ->paginate(10); //orderBy ????
        // $galleries = Gallery::where('id', '>', '100')->get(); // For testing, what if there are no galleries

        return $galleries;
    }

    public function show($id) {

        $gallery = Gallery::with(['gallery_items', 'user:id,first_name,last_name'])->findOrFail($id);

        return $gallery;
    }
}
