<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryIds = \App\Models\Category::pluck('id')->toArray();

        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 10, 1000), 
        ];
    }
    public function configure()
    {
        $categoryIds = \App\Models\Category::pluck('id')->toArray();

        return $this->afterCreating(function (\App\Models\Product $product) use ($categoryIds) {
            $product->categories()->sync($this->faker->randomElements($categoryIds, $this->faker->numberBetween(1,1)));
        });
    }
}
