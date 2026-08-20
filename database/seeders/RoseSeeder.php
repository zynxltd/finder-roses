<?php

namespace Database\Seeders;

use App\Models\Rose;
use Illuminate\Database\Seeder;

class RoseSeeder extends Seeder
{
    public function run(): void
    {
        Rose::query()->delete();

        foreach ($this->roses() as $rose) {
            Rose::query()->create($rose);
        }
    }

    /**
     * Demo catalogue of real Harkness roses from roses.co.uk.
     *
     * @return list<array<string, mixed>>
     */
    private function roses(): array
    {
        return [
            $this->rose(
                code: '780038',
                slug: 'harkness-rose-chandos-beauty',
                name: 'Chandos Beauty',
                type: 'Bush Rose',
                description: 'Award-winning Hybrid Tea with giant champagne to pale apricot blooms and an outstanding spicy-fruity fragrance.',
                locations: ['mixed_borders', 'rose_border', 'pots', 'doorway'],
                sizes: ['medium', 'large'],
                fragrance: 'strong',
                colours: ['apricot_orange', 'white_cream'],
                price: 22.99,
            ),
            $this->rose(
                code: '780034',
                slug: 'catherines-rose',
                name: "Catherine's Rose",
                type: 'Bush Rose',
                description: 'A stunning floribunda in deep to mid rose-pink with a rich perfume and hints of mango. Easy to grow in most gardens.',
                locations: ['mixed_borders', 'rose_border', 'pots', 'front_of_property'],
                sizes: ['medium'],
                fragrance: 'strong',
                colours: ['pink'],
                features: ['windy_or_exposed', 'cuttings'],
                price: 34.99,
            ),
            $this->rose(
                code: '780116',
                slug: 'rose-of-the-year-2026-coral-gardens',
                name: 'Coral Gardens',
                type: 'Floribunda',
                description: 'Rose of the Year 2026. Coral-orange blooms with soft pink tones, a fruity fragrance and excellent disease resistance.',
                locations: ['mixed_borders', 'rose_border', 'pots', 'doorway', 'front_of_property'],
                sizes: ['short', 'small', 'medium'],
                fragrance: 'medium',
                colours: ['apricot_orange', 'pink'],
                features: ['cuttings'],
                price: 22.99,
            ),
            $this->rose(
                code: '780065',
                slug: 'climbing-rose-eden-88',
                name: 'Climbing Eden',
                type: 'Climbing Rose',
                description: 'A romantic old-fashioned climber with soft pink blooms. Ideal for walls, arches and pergolas, flowering repeatedly.',
                locations: ['wall_fence', 'large_arch', 'pergola', 'obelisk'],
                sizes: ['tall', 'large'],
                fragrance: 'medium',
                colours: ['pink'],
                price: 22.99,
            ),
            $this->rose(
                code: '780255',
                slug: 'rose-diamond-wedding-60th-anniversary',
                name: 'Diamond Wedding 60th Anniversary',
                type: 'Bush Rose',
                description: 'Elegant creamy-white blooms chosen to celebrate diamond weddings. A refined gift rose for borders and containers.',
                locations: ['mixed_borders', 'doorway', 'pots', 'front_of_property'],
                sizes: ['small', 'medium'],
                fragrance: 'medium',
                colours: ['white_cream'],
                price: 22.99,
            ),
            $this->rose(
                code: '780248',
                slug: 'rose-peace',
                name: 'Peace',
                type: 'Bush Rose',
                description: 'The classic yellow Hybrid Tea edged with pink. A much-loved garden favourite with large, beautifully formed blooms.',
                locations: ['mixed_borders', 'rose_border', 'front_of_property'],
                sizes: ['medium', 'large'],
                fragrance: 'medium',
                colours: ['yellow', 'pink', 'bi_colour'],
                features: ['cuttings'],
                price: 22.99,
            ),
            $this->rose(
                code: '780194',
                slug: 'rose-of-the-year-2022-its-a-wonderful-life',
                name: "It's a Wonderful Life",
                type: 'Bush Rose',
                description: 'Rose of the Year 2022. Cheerful peachy-pink blooms with excellent health and generous repeat flowering.',
                locations: ['mixed_borders', 'hedge', 'doorway', 'front_of_property'],
                sizes: ['medium'],
                fragrance: 'medium',
                colours: ['pink', 'apricot_orange'],
                features: ['windy_or_exposed'],
                price: 22.99,
            ),
            $this->rose(
                code: '780188',
                slug: 'rose-of-the-year-2006-hot-chocolate',
                name: 'Hot Chocolate',
                type: 'Floribunda',
                description: 'Rose of the Year 2006. Unusual smoky chocolate-red blooms with a light fragrance and strong garden presence.',
                locations: ['mixed_borders', 'rose_border', 'pots'],
                sizes: ['small', 'medium'],
                fragrance: 'delicate',
                colours: ['red', 'bi_colour'],
                price: 22.99,
            ),
            $this->rose(
                code: '780011',
                slug: 'rose-amber-queen-4l-pot-roty-1984-ngw',
                name: 'Amber Queen',
                type: 'Bush Rose',
                description: 'Rose of the Year 1984 and RHS Award of Garden Merit. Pure golden-amber blooms on a compact, bushy plant.',
                locations: ['mixed_borders', 'pots', 'doorway', 'front_of_property'],
                sizes: ['short', 'small'],
                fragrance: 'medium',
                colours: ['apricot_orange', 'yellow'],
                light: ['full_sun', 'partial_sun'],
                price: 22.99,
            ),
            $this->rose(
                code: '780189',
                slug: 'rose-iceberg',
                name: 'Iceberg',
                type: 'Floribunda',
                description: 'A reliable white floribunda producing generous clusters of blooms throughout summer. Excellent in pots and borders.',
                locations: ['mixed_borders', 'hedge', 'pots', 'doorway'],
                sizes: ['medium'],
                fragrance: 'delicate',
                colours: ['white_cream'],
                light: ['full_sun', 'partial_sun', 'shade_areas'],
                aspects: ['north_facing', 'east_south_west_facing', 'north_east_south_west_facing'],
                price: 19.99,
            ),
            $this->rose(
                code: '780282',
                slug: 'rose-queen-elizabeth',
                name: 'Queen Elizabeth',
                type: 'Bush Rose',
                description: 'A tall, elegant Hybrid Tea with clear pink blooms. Ideal for the back of a border or as a striking statement plant.',
                locations: ['mixed_borders', 'rose_border', 'hedge', 'front_of_property'],
                sizes: ['large', 'tall'],
                fragrance: 'medium',
                colours: ['pink'],
                features: ['cuttings'],
                price: 22.99,
            ),
            $this->rose(
                code: '531004',
                slug: 'rose-penny-lane-climbing-4l-potted',
                name: 'Penny Lane',
                type: 'Climbing Rose',
                description: 'A fragrant climbing rose with soft honey-cream blooms. Perfect for arches, walls and sunny fences.',
                locations: ['wall_fence', 'large_arch', 'pergola', 'obelisk'],
                sizes: ['tall', 'large'],
                fragrance: 'strong',
                colours: ['white_cream', 'apricot_orange'],
                price: 22.99,
            ),
            $this->rose(
                code: '780366',
                slug: 'the-saga-rose',
                name: 'The Saga Rose',
                type: 'Bush Rose',
                description: 'A handsome Harkness variety bred for garden performance, with richly coloured blooms and reliable flowering.',
                locations: ['mixed_borders', 'rose_border', 'doorway'],
                sizes: ['medium', 'large'],
                fragrance: 'medium',
                colours: ['pink', 'red'],
                price: 22.99,
            ),
            $this->rose(
                code: '780156',
                slug: 'rose-of-the-year-2015-for-your-eyes-only',
                name: 'For Your Eyes Only',
                type: 'Floribunda',
                description: 'Rose of the Year 2015. Open-centred blooms in coral to apricot tones with a distinctive eye and light scent.',
                locations: ['mixed_borders', 'hedge', 'front_of_property', 'pots'],
                sizes: ['small', 'medium'],
                fragrance: 'delicate',
                colours: ['apricot_orange', 'pink', 'bi_colour'],
                features: ['windy_or_exposed'],
                price: 22.99,
            ),
            $this->rose(
                code: '780004',
                slug: 'harkness-fab-at-65-birthday-rose',
                name: 'Fab at 65',
                type: 'Bush Rose',
                description: 'A cheerful birthday floribunda. Canary-yellow buds open to buttery yellow blooms that fade to creamy elegance.',
                locations: ['mixed_borders', 'pots', 'doorway'],
                sizes: ['short', 'small', 'medium'],
                fragrance: 'medium',
                colours: ['yellow', 'white_cream'],
                price: 22.99,
            ),
            $this->rose(
                code: '780053',
                slug: 'harkness-fab-at-70-birthday-rose',
                name: 'Fab at 70',
                type: 'Bush Rose',
                description: 'A celebratory birthday rose with soft, glowing blooms. Ideal as a thoughtful gift for borders or large pots.',
                locations: ['mixed_borders', 'pots', 'doorway', 'front_of_property'],
                sizes: ['small', 'medium'],
                fragrance: 'medium',
                colours: ['pink', 'apricot_orange'],
                price: 22.99,
            ),
            $this->rose(
                code: '780029',
                slug: 'harkness-rose-ruby-40th-wedding-anniversary',
                name: 'Ruby 40th Wedding Anniversary',
                type: 'Bush Rose',
                description: 'Rich ruby-red blooms chosen to mark ruby weddings. A classic gift rose with strong colour and garden presence.',
                locations: ['mixed_borders', 'rose_border', 'doorway'],
                sizes: ['medium'],
                fragrance: 'medium',
                colours: ['red'],
                features: ['cuttings'],
                price: 22.99,
            ),
            $this->rose(
                code: '780355',
                slug: 'rose-the-birthday-girl',
                name: 'The Birthday Girl',
                type: 'Bush Rose',
                description: 'A joyful gift rose with pretty blooms and a sweet fragrance — perfect for celebrating birthdays in the garden.',
                locations: ['mixed_borders', 'pots', 'doorway', 'front_of_property'],
                sizes: ['short', 'small'],
                fragrance: 'medium',
                colours: ['pink'],
                light: ['full_sun', 'partial_sun'],
                price: 22.99,
            ),
        ];
    }

    /**
     * @param  list<string>  $locations
     * @param  list<string>  $sizes
     * @param  list<string>  $colours
     * @param  list<string>  $light
     * @param  list<string>  $aspects
     * @param  list<string>  $soils
     * @param  list<string>  $features
     * @return array<string, mixed>
     */
    private function rose(
        string $code,
        string $slug,
        string $name,
        string $type,
        string $description,
        array $locations,
        array $sizes,
        string $fragrance,
        array $colours,
        float $price,
        array $light = ['full_sun', 'partial_sun'],
        array $aspects = ['east_south_west_facing', 'north_east_south_west_facing'],
        array $soils = ['all_soil'],
        string $flowering = 'repeat_flowering',
        array $features = [],
    ): array {
        return [
            'name' => $name,
            'type' => $type,
            'description' => $description,
            'image_url' => "https://harkness-roses.s3.amazonaws.com/700/{$code}.jpg",
            'locations' => $locations,
            'sizes' => $sizes,
            'fragrance' => $fragrance,
            'colours' => $colours,
            'light' => $light,
            'aspects' => $aspects,
            'soils' => $soils,
            'flowering' => $flowering,
            'features' => $features,
            'price' => $price,
            'shop_url' => "https://www.roses.co.uk/product/{$code}/{$slug}",
        ];
    }
}
