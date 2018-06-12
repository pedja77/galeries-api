<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    public function galleries() {

        return $this->belongsTo('App\Gallery');
    }
}
