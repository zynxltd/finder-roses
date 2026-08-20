<?php

namespace App\Services;

use App\Models\Rose;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

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
        $query = Rose::query()
            ->where('shop_url', 'like', 'https://www.roses.co.uk/product/%')
            ->orderBy('name');

        $this->whereAnyJsonContains($query, 'locations', $filters['locations']);
        $this->whereAnyJsonContains($query, 'light', $filters['lights']);
        $this->whereAnyJsonContains($query, 'aspects', $filters['aspects']);
        $this->whereAnyJsonContains($query, 'soils', $filters['soils']);

        if ($filters['fragrances'] !== []) {
            $query->whereIn('fragrance', $filters['fragrances']);
        }

        if ($filters['flowerings'] !== []) {
            $query->whereIn('flowering', $filters['flowerings']);
        }

        foreach ($filters['features'] as $feature) {
            $query->whereJsonContains('features', $feature);
        }

        if (filled($filters['size'])) {
            $query->whereJsonContains('sizes', $filters['size']);
        }

        if (filled($filters['colour'])) {
            $query->whereJsonContains('colours', $filters['colour']);
        }

        return $query->paginate(12)->appends(
            collect(request()->query())->except('partial')->all()
        );
    }

    /**
     * @param  Builder<Rose>  $query
     * @param  list<string>  $values
     */
    private function whereAnyJsonContains(Builder $query, string $column, array $values): void
    {
        if ($values === []) {
            return;
        }

        $query->where(function (Builder $builder) use ($column, $values): void {
            foreach ($values as $value) {
                $builder->orWhereJsonContains($column, $value);
            }
        });
    }
}
