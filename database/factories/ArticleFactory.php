<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoryId' => 1, 
            'title' => $this->faker->title(), 
            'description' => $this->faker->sentence(), 
            'image' => $this->faker->image('public/storage/images/articles',640,480, null, false)
        ];
    }
}
