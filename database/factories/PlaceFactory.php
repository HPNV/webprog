<?php

namespace Database\Factories;

use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * The name of the model that is being factory-generated.
     *
     * @var string
     */
    protected $model = Place::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'placeId' => (string) Str::uuid(),
            'name' => $this->faker->company(),
            'imagePath' => $this->faker->imageUrl(),
            'rating' => $this->faker->numberBetween(1, 5),
            'galleryImages' => [
                $this->faker->imageUrl(),
                $this->faker->imageUrl(),
                $this->faker->imageUrl(),
            ],
            'description' => $this->faker->sentence(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
