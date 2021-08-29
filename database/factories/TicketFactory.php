<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
Use App\Models\Best;
use App\Models\Sport;
use App\Models\Type;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

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
            'code'=> $this->faker->name(100),
            'name' =>$name,
            'monto' => $this->faker->randomElement([250,500,750,1000]),
            'name_id' =>  User::all()->random()->id,
            'best_id' =>  Best::all()->random()->id,
            'sport_id' =>  Sport::all()->random()->id,
            'type_id' =>  Type::all()->random()->id,
        ];
    }
}
