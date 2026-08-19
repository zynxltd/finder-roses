<?php

namespace Database\Factories;

use App\Models\Rose;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Rose>
 */
class RoseFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true).' Rose',
            'type' => 'Shrub Rose',
            'description' => fake()->sentence(12),
            'image_url' => 'https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&w=900&q=85',
            'locations' => ['mixed_borders'],
            'sizes' => ['medium'],
            'fragrance' => 'medium',
            'colours' => ['pink'],
            'light' => ['full_sun', 'partial_sun'],
            'aspects' => ['east_south_west_facing'],
            'soils' => ['all_soil'],
            'flowering' => 'repeat_flowering',
            'features' => [],
            'price' => 29.00,
            'shop_url' => '#',
        ];
    }
}
