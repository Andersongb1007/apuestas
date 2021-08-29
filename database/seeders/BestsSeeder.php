<?php

namespace Database\Seeders;

use App\Models\Best;
use App\Models\image;
use App\Models\imageBest;
use Illuminate\Database\Seeder;

class BestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bests = Best::factory(5)->create();
        foreach ($bests as $best) {
            # code...
            image::factory(1)->create([
                'imageable_id' =>$best ->id,
                'imageable_type' =>Best::class
            ]);
        }
    }
}