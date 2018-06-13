<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function users() {

        return $this->belongsTo('App\User');
    }

    public function comments() {

        return $this->hasMany('App\Comment');
    }

    public function gallery_items() {

        return $this->hasMany('App\GalleryItem');
    }

    public function firstGalleryItem() {

        return $this->hasOne('App\GalleryItem')->orderBy('item_order', 'asc');
    }
}
