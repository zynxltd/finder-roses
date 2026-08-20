<?php

namespace App\Services;

use App\Models\Rose;
use App\Support\RoseCatalogue;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Collection;

class RoseFinder
{
    /**
     * @param  array{
     *     locations: list<string>,
     *     lights: list<string>,
     *     aspects: list<string>,
     *     soils: list<string>,
     *     fragrances: list<string>,
     *     flowerings: list<string>,
     *     features: list<string>,
     *     size: ?string,
     *     colour: ?string
     * }  $filters
     * @return LengthAwarePaginator<int, Rose>
     */
    public function search(array $filters): LengthAwarePaginator
    {
        $matches = RoseCatalogue::all()
            ->filter(fn (Rose $rose): bool => $this->matches($rose, $filters))
            ->values();

        return $this->paginate($matches);
    }

    /**
     * @param  array{
     *     locations: list<string>,
     *     lights: list<string>,
     *     aspects: list<string>,
     *     soils: list<string>,
     *     fragrances: list<string>,
     *     flowerings: list<string>,
     *     features: list<string>,
     *     size: ?string,
     *     colour: ?string
     * }  $filters
     */
    private function matches(Rose $rose, array $filters): bool
    {
        if (! str_starts_with((string) $rose->shop_url, 'https://www.roses.co.uk/product/')) {
            return false;
        }

        if (! $this->matchesAny($rose->locations ?? [], $filters['locations'])) {
            return false;
        }

        if (! $this->matchesAny($rose->light ?? [], $filters['lights'])) {
            return false;
        }

        if (! $this->matchesAny($rose->aspects ?? [], $filters['aspects'])) {
            return false;
        }

        if (! $this->matchesAny($rose->soils ?? [], $filters['soils'])) {
            return false;
        }

        if ($filters['fragrances'] !== [] && ! in_array($rose->fragrance, $filters['fragrances'], true)) {
            return false;
        }

        if ($filters['flowerings'] !== [] && ! in_array($rose->flowering, $filters['flowerings'], true)) {
            return false;
        }

        foreach ($filters['features'] as $feature) {
            if (! in_array($feature, $rose->features ?? [], true)) {
                return false;
            }
        }

        if (filled($filters['size']) && ! in_array($filters['size'], $rose->sizes ?? [], true)) {
            return false;
        }

        if (filled($filters['colour']) && ! in_array($filters['colour'], $rose->colours ?? [], true)) {
            return false;
        }

        return true;
    }

    /**
     * @param  list<string>|array<int, string>  $haystack
     * @param  list<string>  $needles
     */
    private function matchesAny(array $haystack, array $needles): bool
    {
        if ($needles === []) {
            return true;
        }

        return array_intersect($needles, $haystack) !== [];
    }

    /**
     * @param  Collection<int, Rose>  $roses
     * @return LengthAwarePaginator<int, Rose>
     */
    private function paginate(Collection $roses): LengthAwarePaginator
    {
        $perPage = 12;
        $page = Paginator::resolveCurrentPage();
        $items = $roses->forPage($page, $perPage)->values();

        return new Paginator(
            $items,
            $roses->count(),
            $perPage,
            $page,
            [
                'path' => Paginator::resolveCurrentPath(),
                'query' => collect(request()->query())->except('partial')->all(),
            ]
        );
    }
}
