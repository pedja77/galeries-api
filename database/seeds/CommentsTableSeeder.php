<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
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
            factory(App\Comment::class)->create([
                'user_id' => $g->user_id,
                'gallery_id' => $g->id
            ]);
        });
    }
}
