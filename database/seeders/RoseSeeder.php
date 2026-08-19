<?php

namespace Database\Seeders;

use App\Models\Rose;
use Illuminate\Database\Seeder;

class RoseSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->roses() as $rose) {
            Rose::updateOrCreate(['name' => $rose['name']], $rose);
        }
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function roses(): array
    {
        return [
            $this->rose([
                'name' => 'Olivia Rose',
                'type' => 'Shrub Rose',
                'description' => 'A versatile, repeat-flowering rose with soft pink blooms and a fresh fragrance.',
                'image_url' => 'https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&w=900&q=85',
                'locations' => ['mixed_borders', 'rose_border', 'doorway', 'hedge'],
                'sizes' => ['small', 'medium'],
                'fragrance' => 'medium',
                'colours' => ['pink'],
                'light' => ['full_sun', 'partial_sun'],
                'aspects' => ['east_south_west_facing', 'north_east_south_west_facing'],
                'features' => ['cuttings'],
                'price' => 29.00,
            ]),
            $this->rose([
                'name' => 'Golden Celebration',
                'type' => 'Shrub / Climber',
                'description' => 'Large golden blooms with a rich fragrance, especially useful where height is wanted.',
                'image_url' => 'https://images.unsplash.com/photo-1518882605630-8ebf8f2e3b22?auto=format&fit=crop&w=900&q=85',
                'locations' => ['wall_fence', 'large_arch', 'obelisk', 'pergola'],
                'sizes' => ['large', 'tall'],
                'fragrance' => 'strong',
                'colours' => ['yellow'],
                'light' => ['full_sun'],
                'aspects' => ['east_south_west_facing'],
                'features' => ['cuttings'],
                'price' => 32.00,
            ]),
            $this->rose([
                'name' => 'Gertrude Jekyll',
                'type' => 'Shrub / Climber',
                'description' => 'Classic rosette blooms with a strong old-rose fragrance and a naturally upright habit.',
                'image_url' => 'https://images.unsplash.com/photo-1495231916356-a86217efff12?auto=format&fit=crop&w=900&q=85',
                'locations' => ['wall_fence', 'large_arch', 'mixed_borders', 'front_of_property'],
                'sizes' => ['large', 'tall'],
                'fragrance' => 'strong',
                'colours' => ['pink'],
                'light' => ['full_sun', 'partial_sun'],
                'aspects' => ['east_south_west_facing', 'north_east_south_west_facing'],
                'features' => ['cuttings'],
                'price' => 31.00,
            ]),
            $this->rose([
                'name' => 'Desdemona',
                'type' => 'Shrub Rose',
                'description' => 'A compact, floriferous choice with pale blooms and a delicate fragrance.',
                'image_url' => 'https://images.unsplash.com/photo-1531058240690-006c446962d8?auto=format&fit=crop&w=900&q=85',
                'locations' => ['mixed_borders', 'pots', 'doorway', 'front_of_property'],
                'sizes' => ['short', 'small'],
                'fragrance' => 'delicate',
                'colours' => ['white_cream'],
                'light' => ['full_sun', 'partial_sun', 'shade_areas'],
                'aspects' => ['north_facing', 'north_east_south_west_facing'],
                'price' => 28.00,
            ]),
            $this->rose([
                'name' => 'Munstead Wood',
                'type' => 'Shrub Rose',
                'description' => 'Deep crimson flowers with a powerful fragrance and a strong garden presence.',
                'image_url' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=900&q=85',
                'locations' => ['mixed_borders', 'rose_border', 'doorway', 'pots'],
                'sizes' => ['small', 'medium'],
                'fragrance' => 'strong',
                'colours' => ['red', 'purple'],
                'light' => ['full_sun', 'partial_sun'],
                'aspects' => ['east_south_west_facing'],
                'features' => ['cuttings'],
                'price' => 30.00,
            ]),
            $this->rose([
                'name' => 'Lady of Shalott',
                'type' => 'Shrub Rose',
                'description' => 'Warm apricot-orange blooms with excellent repeat flowering and a healthy habit.',
                'image_url' => 'https://images.unsplash.com/photo-1468327768560-75b778cbb551?auto=format&fit=crop&w=900&q=85',
                'locations' => ['mixed_borders', 'hedge', 'doorway', 'front_of_property'],
                'sizes' => ['medium', 'large'],
                'fragrance' => 'medium',
                'colours' => ['apricot_orange'],
                'light' => ['full_sun'],
                'aspects' => ['east_south_west_facing', 'north_east_south_west_facing'],
                'soils' => ['all_soil', 'poor_soil'],
                'features' => ['windy_or_exposed'],
                'price' => 29.00,
            ]),
            $this->rose([
                'name' => 'The Generous Gardener',
                'type' => 'Climbing Rose',
                'description' => 'A graceful, vigorous rose suited to arches and walls with softly coloured flowers.',
                'image_url' => 'https://images.unsplash.com/photo-1559563362-c667ba5f5480?auto=format&fit=crop&w=900&q=85',
                'locations' => ['large_arch', 'wall_fence', 'obelisk', 'pergola'],
                'sizes' => ['large', 'tall'],
                'fragrance' => 'strong',
                'colours' => ['pink', 'white_cream'],
                'light' => ['full_sun', 'partial_sun'],
                'aspects' => ['east_south_west_facing'],
                'price' => 34.00,
            ]),
            $this->rose([
                'name' => 'The Poet’s Wife',
                'type' => 'Shrub Rose',
                'description' => 'Cheerful yellow flowers with a compact habit and a rich lemon fragrance.',
                'image_url' => 'https://images.unsplash.com/photo-1589458456444-f7158a7e8a9d?auto=format&fit=crop&w=900&q=85',
                'locations' => ['pots', 'mixed_borders', 'doorway'],
                'sizes' => ['short', 'small', 'medium'],
                'fragrance' => 'strong',
                'colours' => ['yellow'],
                'light' => ['full_sun', 'partial_sun'],
                'aspects' => ['east_south_west_facing', 'north_east_south_west_facing'],
                'price' => 28.00,
            ]),
            $this->rose([
                'name' => 'Boscobel',
                'type' => 'Shrub Rose',
                'description' => 'Salmon-pink rosettes with a warm, myrrh-like fragrance and repeat flowering.',
                'image_url' => 'https://images.unsplash.com/photo-1455659817273-f96807779d8a?auto=format&fit=crop&w=900&q=85',
                'locations' => ['mixed_borders', 'hedge', 'pots', 'rose_border'],
                'sizes' => ['small', 'medium'],
                'fragrance' => 'strong',
                'colours' => ['pink', 'apricot_orange'],
                'light' => ['full_sun'],
                'aspects' => ['east_south_west_facing'],
                'features' => ['cuttings'],
                'price' => 30.00,
            ]),
            $this->rose([
                'name' => 'Claire Austin',
                'type' => 'Climbing Rose',
                'description' => 'Elegant creamy-white blooms, especially attractive trained against walls or arches.',
                'image_url' => 'https://images.unsplash.com/photo-1518709594023-6eab9bab7b23?auto=format&fit=crop&w=900&q=85',
                'locations' => ['wall_fence', 'large_arch', 'obelisk', 'pergola'],
                'sizes' => ['large', 'tall'],
                'fragrance' => 'strong',
                'colours' => ['white_cream'],
                'light' => ['full_sun', 'partial_sun', 'shade_areas'],
                'aspects' => ['north_facing', 'east_south_west_facing', 'north_east_south_west_facing'],
                'features' => ['cuttings'],
                'price' => 33.00,
            ]),
            $this->rose([
                'name' => 'Eustacia Vye',
                'type' => 'Shrub Rose',
                'description' => 'Distinctive pink and apricot colouring with a generous, repeat-flowering habit.',
                'image_url' => 'https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=900&q=85',
                'locations' => ['mixed_borders', 'hedge', 'doorway', 'rose_border'],
                'sizes' => ['medium', 'large'],
                'fragrance' => 'medium',
                'colours' => ['pink', 'apricot_orange', 'bi_colour'],
                'light' => ['full_sun', 'partial_sun'],
                'aspects' => ['east_south_west_facing'],
                'price' => 31.00,
            ]),
            $this->rose([
                'name' => 'Harlow Carr',
                'type' => 'Shrub Rose',
                'description' => 'A fragrant pink rose with a rounded shape, suited to mixed planting and informal hedges.',
                'image_url' => 'https://images.unsplash.com/photo-1527061011665-3652c757a4d4?auto=format&fit=crop&w=900&q=85',
                'locations' => ['mixed_borders', 'hedge', 'doorway', 'front_of_property'],
                'sizes' => ['small', 'medium'],
                'fragrance' => 'strong',
                'colours' => ['pink'],
                'light' => ['full_sun', 'partial_sun'],
                'aspects' => ['north_east_south_west_facing'],
                'soils' => ['all_soil', 'poor_soil'],
                'features' => ['windy_or_exposed'],
                'price' => 29.00,
            ]),
            $this->rose([
                'name' => 'Charles de Mills',
                'type' => 'Gallica Rose',
                'description' => 'A historic, once-flowering gallica with richly quartered magenta blooms.',
                'image_url' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=900&q=85',
                'locations' => ['mixed_borders', 'rose_border'],
                'sizes' => ['medium', 'large'],
                'fragrance' => 'medium',
                'colours' => ['red', 'purple'],
                'light' => ['full_sun', 'partial_sun'],
                'aspects' => ['east_south_west_facing'],
                'flowering' => 'once_flowering',
                'features' => ['cuttings'],
                'price' => 26.00,
            ]),
        ];
    }

    /**
     * @param  array<string, mixed>  $rose
     * @return array<string, mixed>
     */
    private function rose(array $rose): array
    {
        return array_merge([
            'light' => ['full_sun', 'partial_sun'],
            'aspects' => ['east_south_west_facing'],
            'soils' => ['all_soil'],
            'flowering' => 'repeat_flowering',
            'features' => [],
            'shop_url' => '#',
        ], $rose);
    }
}
