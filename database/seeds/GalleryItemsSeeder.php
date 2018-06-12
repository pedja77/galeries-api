<?php

use Illuminate\Database\Seeder;

class GalleryItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galleries = App\Gallery::all();

        $galleries->each(function ($g) {
            factory(App\GalleryItem::class, 3)->create([
                'gallery_id' => $g->id
            ]);
        });
    }
}
