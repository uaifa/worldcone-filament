<?php

namespace Database\Factories;

use App\Models\Term;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $emails = [];
        $count = rand(1, 3);
    
        for($n = 0; $n < $count; $n ++)
        {
          $emails[] = ['value' => $this->faker->unique()->freeEmail];
        }
    
        $phone_numbers = [];
        $count = rand(0, 3);
    
        for($n = 0; $n < $count; $n ++)
        {
          $phone_numbers[] = ['value' => $this->faker->unique()->phoneNumber];
        }
    
        $categories = [];
        $records = Term::where('type', 'category')->inRandomOrder()->get();
    
        $count = rand(0, min($records->count(), 3));
    
        for($n = 0; $n < $count; $n ++)
        {
          $categories[] = $records->pop()->id;
        }
    
    
        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;
    
        return [
          'name' => $first_name . ' ' . $last_name,
    
          'contact' => [
            'first_name' => $first_name,
            'last_name' => $first_name,
    
            'birth_date' => $this->faker->dateTimeBetween('-80 years', '-28 years'),
            'death_date' => rand(0, 1000) < 50 ? $this->faker->dateTimeBetween('-8 years', '-1 day') : null,
    
            'emails'        => $emails,
            'phone_numbers' => $phone_numbers,
          ],
    
          'address_1'    => $this->faker->streetAddress,
          'city'         => $this->faker->city,
          'county'       => $this->faker->county(),
          'postcode'     => $this->faker->postcode,
    
          'source_id'    => optional(Term::where('type', 'source')->inRandomOrder()->first())->id,
          'category_id'    => optional(Term::where('type', 'category')->inRandomOrder()->first())->id,
          'status'       => Arr::random(ClientStatus::toArray()),
          'user_id' => optional(User::inRandomOrder()->first())->id
        ];

    }
}
