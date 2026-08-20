<?php

use App\Models\Rose;
use App\Support\RoseFinderCatalog;
use Database\Seeders\RoseSeeder;

it('shows the rose finder with matching roses', function () {
    Rose::factory()->create(['name' => 'Olivia Rose']);

    $this->get(route('rose-finder'))
        ->assertSuccessful()
        ->assertSee('Rose Finder')
        ->assertSee('Olivia Rose')
        ->assertSee('Find your perfect rose')
        ->assertSee('Customise your search')
        ->assertSee('Lifetime Guarantee On All Roses')
        ->assertSee('Rose Finder')
        ->assertDontSee('What are you looking for?')
        ->assertSee('Harkness');
});

it('shows real catalogue roses with roses.co.uk product links', function () {
    $this->seed(RoseSeeder::class);

    $this->get(route('rose-finder'))
        ->assertSuccessful()
        ->assertSee('Chandos Beauty')
        ->assertSee('Catherine\'s Rose')
        ->assertSee('https://www.roses.co.uk/product/780038/harkness-rose-chandos-beauty')
        ->assertSee('https://harkness-roses.s3.amazonaws.com/700/780038.jpg')
        ->assertDontSee('Olivia Rose')
        ->assertDontSee('Munstead Wood');
});

it('filters roses by location', function () {
    Rose::factory()->create([
        'name' => 'Patio Gem',
        'locations' => ['pots'],
    ]);
    Rose::factory()->create([
        'name' => 'Wall Climber',
        'locations' => ['wall_fence'],
    ]);

    $this->get(route('rose-finder', ['locations' => ['pots']]))
        ->assertSuccessful()
        ->assertSee('Patio Gem')
        ->assertDontSee('Wall Climber')
        ->assertSee('Pots & Containers');
});

it('filters roses by fragrance and colour', function () {
    Rose::factory()->create([
        'name' => 'Strong Pink',
        'fragrance' => 'strong',
        'colours' => ['pink'],
    ]);
    Rose::factory()->create([
        'name' => 'Delicate Yellow',
        'fragrance' => 'delicate',
        'colours' => ['yellow'],
    ]);

    $this->get(route('rose-finder', [
        'fragrances' => ['strong'],
        'colour' => 'pink',
    ]))
        ->assertSuccessful()
        ->assertSee('Strong Pink')
        ->assertDontSee('Delicate Yellow');
});

it('filters roses that are good in shade', function () {
    Rose::factory()->create([
        'name' => 'Shade Rose',
        'light' => ['shade_areas', 'partial_sun'],
    ]);
    Rose::factory()->create([
        'name' => 'Sun Rose',
        'light' => ['full_sun'],
    ]);

    $this->get(route('rose-finder', ['lights' => ['shade_areas']]))
        ->assertSuccessful()
        ->assertSee('Shade Rose')
        ->assertDontSee('Sun Rose');
});

it('requires roses to match every selected extra feature', function () {
    Rose::factory()->create([
        'name' => 'Cutting Rose',
        'features' => ['cuttings'],
    ]);
    Rose::factory()->create([
        'name' => 'Exposed Cutter',
        'features' => ['cuttings', 'windy_or_exposed'],
    ]);

    $this->get(route('rose-finder', ['features' => ['cuttings', 'windy_or_exposed']]))
        ->assertSuccessful()
        ->assertSee('Exposed Cutter')
        ->assertDontSee('Cutting Rose');
});

it('rejects unknown filter values', function () {
    $this->from(route('rose-finder'))
        ->get(route('rose-finder', ['locations' => ['not-a-place']]))
        ->assertRedirect(route('rose-finder'));
});

it('exposes an icon for every location filter', function () {
    expect(array_keys(RoseFinderCatalog::locationIcons()))
        ->toEqual(array_keys(RoseFinderCatalog::locations()));
});

it('exposes an icon for every colour filter', function () {
    expect(array_keys(RoseFinderCatalog::colourIcons()))
        ->toEqual(array_keys(RoseFinderCatalog::colours()));
});

it('shows colour rose icons in the finder drawer', function () {
    $this->get(route('rose-finder'))
        ->assertSuccessful()
        ->assertSee('images/finder/colours/PINK.png', false)
        ->assertSee('images/finder/colours/RED.png', false)
        ->assertSee('data-colour-picker', false);
});

it('returns partial finder updates as json', function () {
    Rose::factory()->create([
        'name' => 'Ajax Rose',
        'locations' => ['pots'],
    ]);

    $this->getJson(route('rose-finder', ['locations' => ['pots'], 'partial' => 1]))
        ->assertSuccessful()
        ->assertJsonStructure([
            'total',
            'results',
            'chips',
            'drawerFooter',
        ])
        ->assertJsonPath('total', 1);
});

it('renders html when a browser opens a partial query without json accept', function () {
    Rose::factory()->count(13)->create([
        'locations' => ['mixed_borders'],
    ]);

    $this->get(route('rose-finder', [
        'partial' => 1,
        'locations' => ['mixed_borders'],
        'page' => 2,
    ]))
        ->assertSuccessful()
        ->assertSee('Find your perfect rose')
        ->assertDontSee('"results":', false);
});

it('keeps partial out of pagination links', function () {
    Rose::factory()->count(13)->create();

    $html = $this->get(route('rose-finder', ['partial' => 1]))
        ->assertSuccessful()
        ->getContent();

    preg_match('/class="finder-pagination"(.*?)<\/nav>/s', $html, $matches);

    expect($matches[1] ?? '')
        ->not->toBeEmpty()
        ->not->toContain('partial');
});
