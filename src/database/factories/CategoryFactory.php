<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
   public function definition()
{
    return [
        // 'name' ではなく、実際のカラム名に合わせる
        'content' => $this->faker->word, 
    ];
}
}
