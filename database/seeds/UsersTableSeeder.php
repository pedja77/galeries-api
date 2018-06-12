<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 10)->create();  //->each(function ($u) {
        //     $u->galleries()->save(factory(App\Gallery::class, 3)->create()->each(function ($g) use ($u) {
        //         $comment = factory(App\Comment::class)->make([
        //             'userId' => $u->id,
        //             'galleryId' => $g->id
        //         ]);
        //         $comment->save();

        //     }));
         //});
        factory(App\User::class, 10)->create()->each(function ($u) {
            $u->galleries()->save(factory(App\Gallery::class)->make());
        });
    }
}
