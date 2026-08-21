<?php

namespace App\Http\Requests;

use App\Support\RoseFinderCatalog;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterRosesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        foreach (['size', 'colour', 'sort'] as $field) {
            if ($this->input($field) === '') {
                $this->merge([$field => null]);
            }
        }
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'locations' => ['sometimes', 'array'],
            'locations.*' => ['string', Rule::in(array_keys(RoseFinderCatalog::locations()))],
            'lights' => ['sometimes', 'array'],
            'lights.*' => ['string', Rule::in(array_keys(RoseFinderCatalog::lights()))],
            'aspects' => ['sometimes', 'array'],
            'aspects.*' => ['string', Rule::in(array_keys(RoseFinderCatalog::aspects()))],
            'soils' => ['sometimes', 'array'],
            'soils.*' => ['string', Rule::in(array_keys(RoseFinderCatalog::soils()))],
            'fragrances' => ['sometimes', 'array'],
            'fragrances.*' => ['string', Rule::in(array_keys(RoseFinderCatalog::fragrances()))],
            'flowerings' => ['sometimes', 'array'],
            'flowerings.*' => ['string', Rule::in(array_keys(RoseFinderCatalog::flowerings()))],
            'features' => ['sometimes', 'array'],
            'features.*' => ['string', Rule::in(array_keys(RoseFinderCatalog::features()))],
            'size' => ['sometimes', 'nullable', 'string', Rule::in(array_keys(RoseFinderCatalog::sizes()))],
            'colour' => ['sometimes', 'nullable', 'string', Rule::in(array_keys(RoseFinderCatalog::colours()))],
            'sort' => ['sometimes', 'nullable', 'string', Rule::in(array_keys(RoseFinderCatalog::sorts()))],
        ];
    }

    /**
     * @return array{
     *     locations: list<string>,
     *     lights: list<string>,
     *     aspects: list<string>,
     *     soils: list<string>,
     *     fragrances: list<string>,
     *     flowerings: list<string>,
     *     features: list<string>,
     *     size: ?string,
     *     colour: ?string,
     *     sort: string
     * }
     */
    public function filters(): array
    {
        $validated = $this->validated();

        return [
            'locations' => array_values($validated['locations'] ?? []),
            'lights' => array_values($validated['lights'] ?? []),
            'aspects' => array_values($validated['aspects'] ?? []),
            'soils' => array_values($validated['soils'] ?? []),
            'fragrances' => array_values($validated['fragrances'] ?? []),
            'flowerings' => array_values($validated['flowerings'] ?? []),
            'features' => array_values($validated['features'] ?? []),
            'size' => $validated['size'] ?? null,
            'colour' => $validated['colour'] ?? null,
            'sort' => $validated['sort'] ?? RoseFinderCatalog::defaultSort(),
        ];
    }

    public function hasActiveFilters(): bool
    {
        $filters = $this->filters();

        foreach (['locations', 'lights', 'aspects', 'soils', 'fragrances', 'flowerings', 'features'] as $key) {
            if ($filters[$key] !== []) {
                return true;
            }
        }

        return filled($filters['size']) || filled($filters['colour']);
    }

    /**
     * @return list<array{label: string, url: string}>
     */
    public function activeChips(): array
    {
        $filters = $this->filters();
        $chips = [];

        foreach (['locations', 'lights', 'aspects', 'soils', 'fragrances', 'flowerings', 'features'] as $group) {
            foreach ($filters[$group] as $value) {
                $chips[] = [
                    'label' => RoseFinderCatalog::optionLabel($group, $value),
                    'url' => $this->urlWithout($group, $value),
                ];
            }
        }

        foreach (['size', 'colour'] as $field) {
            if (filled($filters[$field])) {
                $chips[] = [
                    'label' => RoseFinderCatalog::optionLabel($field, $filters[$field]),
                    'url' => $this->urlWithout($field),
                ];
            }
        }

        return $chips;
    }

    public function urlWithout(string $key, ?string $value = null): string
    {
        $query = $this->filters();

        if ($value === null) {
            $query[$key] = is_array($query[$key] ?? null) ? [] : null;
        } else {
            $query[$key] = array_values(array_filter(
                $query[$key],
                fn (string $item): bool => $item !== $value
            ));
        }

        if (($query['sort'] ?? null) === RoseFinderCatalog::defaultSort()) {
            unset($query['sort']);
        }

        $query = array_filter(
            $query,
            fn (mixed $item): bool => $item !== [] && $item !== null && $item !== ''
        );

        return route('rose-finder', $query);
    }
}
