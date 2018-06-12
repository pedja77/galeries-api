<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 3)->create();

        $users->each(function($u) {
            factory(App\Gallery::class, 3)->create([
                'user_id' => $u->id
            ]);
        });

        // factory(App\Gallery::class, 10)->create()->each(function ($g) {
        //     $user = App\User::all();
        //     $user->each(function ($u) use ($g) {
        //         $g->user_id = $u->id;
        //     });
        // });
    }
}
