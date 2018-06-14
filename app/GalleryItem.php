<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    public function gallery() {

        return $this->belongsTo('App\Gallery');
    }

    // public function scopeFirstImage($query) {

    //     $query->orderBy('item_order', 'asc')->take(2);
    // }
}
