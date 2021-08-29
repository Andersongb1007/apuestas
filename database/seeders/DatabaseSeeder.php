<?php

namespace Database\Seeders;

use App\Models\bets;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\post as ModelsPost;
use App\Models\Sport;
use App\Models\tag;
use App\Models\tags;
use App\Models\Ticket;
use App\Models\type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        Storage::makeDirectory('posts');
        Storage::makeDirectory('bests');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Sport::factory(4)->create();
        tags::factory(4)->create();
        type::factory(4)->create();

        $this->call(BestsSeeder::class);
        Ticket::factory(4)->create();
        //$this->call(PostSeeder::class);

    }
}