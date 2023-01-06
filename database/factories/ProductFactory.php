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
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(5),
            'pictures' => json_encode(['https://iso.500px.com/wp-content/uploads/2016/03/stock-photo-142984111-1500x1000.jpg', 'https://iso.500px.com/wp-content/uploads/2016/03/stock-photo-142984111-1500x1000.jpg']),
            'price' => '4000',
            'quantity' => '10',
            'category_id' => 1
        ];
    }
}