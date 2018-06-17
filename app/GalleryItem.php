<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'image_link', 'item_order'
    ];


    public function gallery() {

        return $this->belongsTo('App\Gallery');
    }

    // public function scopeFirstImage($query) {

    //     $query->orderBy('item_order', 'asc')->take(2);
    // }
}
