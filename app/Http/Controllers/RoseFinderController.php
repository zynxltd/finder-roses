<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRosesRequest;
use App\Support\RoseFinderCatalog;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class RoseFinderController extends Controller
{
    public function index(FilterRosesRequest $request): View
    {
        /*
        |--------------------------------------------------------------------------
        | DEMO ROSE CATALOGUE
        |--------------------------------------------------------------------------
        |
        | Temporary catalogue data.
        |
        | These are deliberately kept in the controller for now so that
        | the finder can operate without the database / RoseFinder service.
        |
        | Each item is converted to an object further down so the existing
        | Blade template can continue using:
        |
        | $rose->name
        | $rose->type
        | $rose->description
        | $rose->image_url
        | $rose->price
        | $rose->shop_url
        |
        */

        $allRoses = [

            [
                'name' => 'Princess Alexandra of Kent',
                'type' => 'English Rose',
                'description' => 'A beautiful large-flowered rose with warm pink blooms and a rich tea-like fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540322.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'large',
                'colour' => 'pink',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'disease-resistant',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Gertrude Jekyll',
                'type' => 'English Rose',
                'description' => 'A classic rose with deeply cupped pink flowers and an exceptionally strong old-rose fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/530075.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'medium',
                'colour' => 'pink',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Lady of Shalott',
                'type' => 'English Rose',
                'description' => 'A vigorous repeat-flowering rose producing glowing orange-red blooms throughout the season.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540234.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'large',
                'colour' => 'orange',
                'characteristics' => [
                    'repeat-flowering',
                    'disease-resistant',
                    'full-sun',
                    'fragrant',
                ],
            ],

            [
                'name' => 'Olivia Rose Austin',
                'type' => 'English Rose',
                'description' => 'A soft pink rose with beautiful cupped flowers, repeat flowering and a delicate fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/530435.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'medium',
                'colour' => 'pink',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'disease-resistant',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Desdemona',
                'type' => 'English Rose',
                'description' => 'An elegant white rose with blush-pink buds, beautifully formed flowers and a strong fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540374.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'medium',
                'colour' => 'white',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'full-sun',
                ],
            ],

            [
                'name' => 'The Generous Gardener',
                'type' => 'Climbing Rose',
                'description' => 'A vigorous climbing rose covered in soft pink flowers with a wonderful musky fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540338.jpg',
                'price' => 25.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'large',
                'colour' => 'pink',
                'characteristics' => [
                    'climbing',
                    'fragrant',
                    'repeat-flowering',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Munstead Wood',
                'type' => 'English Rose',
                'description' => 'A richly coloured crimson rose with a powerful old-rose fragrance and repeat flowering.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/530249.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'medium',
                'colour' => 'red',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'full-sun',
                    'disease-resistant',
                ],
            ],

            [
                'name' => 'Claire Austin',
                'type' => 'English Rose',
                'description' => 'Large creamy-white blooms with a fresh myrrh fragrance and excellent repeat flowering.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540373.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'large',
                'colour' => 'white',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Jubilee Celebration',
                'type' => 'English Rose',
                'description' => 'Large salmon-pink flowers with a wonderful fruity fragrance and strong repeat flowering.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/530199.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'large',
                'colour' => 'pink',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'full-sun',
                ],
            ],

            [
                'name' => 'The Ancient Mariner',
                'type' => 'English Rose',
                'description' => 'A highly fragrant rose with masses of large, bright pink flowers from early summer onwards.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/530022.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'large',
                'colour' => 'pink',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Boscobel',
                'type' => 'English Rose',
                'description' => 'Warm salmon-pink flowers with a complex myrrh and fruit fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540281.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'medium',
                'colour' => 'pink',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'disease-resistant',
                    'full-sun',
                ],
            ],

            [
                'name' => 'The Poet’s Wife',
                'type' => 'English Rose',
                'description' => 'A bright yellow rose with perfectly formed blooms and a delicious fruity fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540372.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'medium',
                'colour' => 'yellow',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Roald Dahl',
                'type' => 'English Rose',
                'description' => 'A charming apricot-coloured rose with beautifully rounded flowers and a light tea fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540378.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'medium',
                'colour' => 'apricot',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'disease-resistant',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Gabriel Oak',
                'type' => 'English Rose',
                'description' => 'A striking deep pink rose with large flowers and an intense fruity fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540380.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'large',
                'colour' => 'pink',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'full-sun',
                    'disease-resistant',
                ],
            ],

            [
                'name' => 'James Galway',
                'type' => 'English Rose',
                'description' => 'A tall, vigorous rose with beautiful pink flowers and a pleasant old-rose fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540312.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'large',
                'colour' => 'pink',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'climbing',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Golden Celebration',
                'type' => 'English Rose',
                'description' => 'Large golden-yellow flowers with an exceptionally strong fragrance.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540391.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'large',
                'colour' => 'yellow',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'climbing',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Darcey Bussell',
                'type' => 'English Rose',
                'description' => 'A compact crimson rose producing masses of richly coloured flowers throughout the season.',
                'image_url' => 'https://www.roses.co.uk/',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'compact',
                'colour' => 'red',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'container-friendly',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Sophy’s Rose',
                'type' => 'English Rose',
                'description' => 'A vibrant red rose with a pleasing fragrance and excellent repeat flowering.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/530436.jpg',
                'price' => 24.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'medium',
                'colour' => 'red',
                'characteristics' => [
                    'fragrant',
                    'repeat-flowering',
                    'disease-resistant',
                    'full-sun',
                ],
            ],

            [
                'name' => 'Iceberg',
                'type' => 'Floribunda Rose',
                'description' => 'A reliable white-flowered rose producing generous clusters of blooms throughout the summer.',
                'image_url' => 'https://harkness-roses.s3.amazonaws.com/400/540382.jpg',
                'price' => 19.95,
                'shop_url' => 'https://www.roses.co.uk/',
                'size' => 'medium',
                'colour' => 'white',
                'characteristics' => [
                    'repeat-flowering',
                    'disease-resistant',
                    'full-sun',
                    'container-friendly',
                ],
            ],

        ];


        /*
        |--------------------------------------------------------------------------
        | FILTERS
        |--------------------------------------------------------------------------
        */

        $filters = $request->filters();


        /*
        |--------------------------------------------------------------------------
        | START WITH COMPLETE DEMO CATALOGUE
        |--------------------------------------------------------------------------
        */

        $filteredRoses = collect($allRoses);


        /*
        |--------------------------------------------------------------------------
        | SIZE FILTER
        |--------------------------------------------------------------------------
        */

        if (!empty($filters['size'])) {

            $selectedSize = strtolower($filters['size']);

            $filteredRoses = $filteredRoses->filter(
                function (array $rose) use ($selectedSize) {

                    return strtolower(
                        $rose['size'] ?? ''
                    ) === $selectedSize;
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | COLOUR FILTER
        |--------------------------------------------------------------------------
        */

        if (!empty($filters['colour'])) {

            $selectedColour = strtolower($filters['colour']);

            $filteredRoses = $filteredRoses->filter(
                function (array $rose) use ($selectedColour) {

                    return strtolower(
                        $rose['colour'] ?? ''
                    ) === $selectedColour;
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CHARACTERISTIC FILTERS
        |--------------------------------------------------------------------------
        |
        | Each selected characteristic must be present on the rose.
        |
        | If the user selects:
        |
        | fragrant + repeat-flowering
        |
        | the rose must contain BOTH.
        |
        */

        foreach ($groups = RoseFinderCatalog::characteristicGroups() as $group) {

            $key = $group['key'];

            $selected = $filters[$key] ?? [];

            if (empty($selected)) {
                continue;
            }

            $selected = array_map(
                'strtolower',
                (array) $selected
            );

            $filteredRoses = $filteredRoses->filter(
                function (array $rose) use ($selected) {

                    $roseCharacteristics = array_map(
                        'strtolower',
                        $rose['characteristics'] ?? []
                    );

                    /*
                     * Require every selected characteristic.
                     */

                    return empty(
                        array_diff(
                            $selected,
                            $roseCharacteristics
                        )
                    );
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CONVERT ARRAYS TO OBJECTS
        |--------------------------------------------------------------------------
        |
        | Your existing Blade expects:
        |
        | $rose->name
        |
        | rather than:
        |
        | $rose['name']
        |
        */

        $filteredRoses = $filteredRoses
            ->values()
            ->map(function (array $rose) {
                return (object) $rose;
            })
            ->all();


        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        |
        | This preserves the Laravel paginator API used by your Blade:
        |
        | $roses->total()
        | $roses->isEmpty()
        | $roses->hasPages()
        | $roses->links()
        |
        */

        $perPage = 12;

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $currentItems = array_slice(
            $filteredRoses,
            ($currentPage - 1) * $perPage,
            $perPage
        );

        $roses = new LengthAwarePaginator(
            $currentItems,
            count($filteredRoses),
            $perPage,
            $currentPage,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'query' => $request->query(),
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view('rose-finder.index', [

            'groups' => RoseFinderCatalog::characteristicGroups(),

            'sizes' => RoseFinderCatalog::sizes(),

            'colours' => RoseFinderCatalog::colours(),

            'filters' => $filters,

            'hasFilters' => $request->hasActiveFilters(),

            'chips' => $request->activeChips(),

            'roses' => $roses,

        ]);
    }
}