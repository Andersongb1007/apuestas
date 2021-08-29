<?php

namespace Database\Seeders;

use App\Models\image;
use App\Models\post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $posts = post::factory(1)->create();
        foreach ($posts as $post) {
            # code...
            image::factory(1)->create([
                'imageable_id' =>$post ->id,
                'imageable_type' =>post::class
            ]);
        }
    }
}
