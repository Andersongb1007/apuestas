<?php

namespace Database\Factories;

use App\Models\Best;
use App\Models\Sport;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Best::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->unique()->word(20);
        return [
            //Genera relleno
            'name' =>$name,
            'slug' =>Str::slug($name),
            'extract' => $this->faker->text(200),
            'body' => $this->faker->text(2000),
            'status' =>$this->faker->randomElement([1,2,3]),
            'sport_id' =>  Sport::all()->random()->id,

        ];
    }
}