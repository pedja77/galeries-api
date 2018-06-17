<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Gallery;
use App\GalleryItem;

class GalleriesController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|min:2|max:255',
            'description' => 'string|max:1000',
            'gallery_items' => 'required|array|min:1',
            'gallery_items.*.image_link' => 'required|url'
        ]);
    }

    public function index() {
        $id = request()->input('id');
        if ($id) {

             $galleries = Gallery::with(['firstGalleryItem', 'user:id,first_name,last_name'])
             ->where('user_id', '=', $id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        } else {
             $galleries = Gallery::with(['firstGalleryItem', 'user:id,first_name,last_name'])
            ->orderBy('id', 'desc')
            ->paginate(10); //orderBy ????
        // $galleries = Gallery::where('id', '>', '100')->get(); // For testing, what if there are no galleries
        }



        return $galleries;
    }

    public function show($id) {

        $gallery = Gallery::with(['gallery_items', 'user:id,first_name,last_name'])->findOrFail($id);

        return $gallery;
    }

    public function store(Request $request) {

        //\Log::debug("store gallery " . $request->input('user_id'));

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        };

        $gallery = new Gallery();
        $gallery->user_id = request()->user_id;
        $gallery->title = request()->title;
        $gallery->description = request()->description;
        $gallery_items = request()->input('gallery_items');

        \Log::debug('gallery' . $gallery);
        $gallery->save();

        $gallery_items = collect(request()->gallery_items)->mapInto(GalleryItem::class);

        $gallery->gallery_items()->saveMany($gallery_items);

        return $gallery;
    }
}
