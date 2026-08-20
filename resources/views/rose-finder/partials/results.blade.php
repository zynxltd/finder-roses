@php
    use App\Support\RoseFinderCatalog;

    $sizeRanks = [
        'short' => 1,
        'small' => 2,
        'medium' => 3,
        'large' => 4,
        'tall' => 5,
    ];

    $fragranceRanks = [
        'delicate' => 1,
        'medium' => 2,
        'strong' => 3,
    ];

    $colourIcons = RoseFinderCatalog::colourIcons();
    $activeColour = $filters['colour'] ?? null;
@endphp

<div class="results-header">

    <div>

        <span class="finder-label">
            Your results
        </span>

        <h2>
            {{ $roses->total() }}
            {{ Str::plural('rose', $roses->total()) }}
        </h2>

    </div>


    @if($roses->total())

        <p>
            Showing roses matching your selected criteria
        </p>

    @endif

</div>


@if($roses->isEmpty())

    <div class="empty-results">

        <div
            class="empty-results-icon"
            aria-hidden="true"
        >
            ♧
        </div>

        <span class="finder-label">
            Nothing quite yet
        </span>

        <h2>
            No roses match those filters
        </h2>

        <p>
            Try removing one of your selections or start again
            with a broader size or colour.
        </p>

        @if($activeColour && isset($colourIcons[$activeColour]))
            <div class="proto-colour-empty">
                <img
                    src="{{ asset('images/finder/colours/'.$colourIcons[$activeColour]) }}"
                    alt="{{ $colours[$activeColour] ?? 'Selected colour' }}"
                    width="42"
                    height="42"
                >
            </div>

            <p class="proto-relax-colour">
                <a href="{{ request()->fullUrlWithoutQuery(['colour', 'partial', 'page']) }}">
                    Relax colour (keep other filters)
                </a>
            </p>
        @endif

        <a
            class="primary-button"
            href="{{ route('rose-finder') }}"
        >
            <span>
                Clear all filters
            </span>

            <span aria-hidden="true">
                →
            </span>
        </a>

    </div>

@else

    <div class="results-grid">

        @foreach($roses as $rose)

            @php
                $sizeKey = is_array($rose->sizes) ? ($rose->sizes[0] ?? null) : $rose->sizes;
                $sizeLabel = $sizeKey ? RoseFinderCatalog::optionLabel('size', $sizeKey) : null;
                $sizeRank = $sizeRanks[$sizeKey] ?? 3;
                $fragranceKey = $rose->fragrance;
                $fragranceLabel = $fragranceKey
                    ? RoseFinderCatalog::optionLabel('fragrances', $fragranceKey)
                    : null;
                $fragranceRank = $fragranceRanks[$fragranceKey] ?? 2;
                $floweringLabel = $rose->flowering
                    ? RoseFinderCatalog::optionLabel('flowerings', $rose->flowering)
                    : null;

                $matchReasons = [];

                if ($activeColour && in_array($activeColour, $rose->colours ?? [], true)) {
                    $matchReasons[] = RoseFinderCatalog::optionLabel('colour', $activeColour);
                }

                foreach (($filters['locations'] ?? []) as $value) {
                    if (in_array($value, $rose->locations ?? [], true)) {
                        $matchReasons[] = RoseFinderCatalog::optionLabel('locations', $value);
                    }
                }

                foreach (($filters['flowerings'] ?? []) as $value) {
                    if ($rose->flowering === $value) {
                        $matchReasons[] = RoseFinderCatalog::optionLabel('flowerings', $value);
                    }
                }

                foreach (($filters['fragrances'] ?? []) as $value) {
                    if ($rose->fragrance === $value) {
                        $matchReasons[] = RoseFinderCatalog::optionLabel('fragrances', $value);
                    }
                }

                if (! empty($filters['size']) && in_array($filters['size'], $rose->sizes ?? [], true)) {
                    $matchReasons[] = RoseFinderCatalog::optionLabel('size', $filters['size']);
                }

                $matchReasons = array_values(array_unique($matchReasons));
                $matchReasons = array_slice($matchReasons, 0, 3);
            @endphp

            <article
                class="rose-card"
                data-compare-id="{{ $rose->id }}"
                data-size-label="{{ $sizeLabel }}"
                data-fragrance-label="{{ $fragranceLabel }}"
                data-flowering-label="{{ $floweringLabel }}"
                style="--proto-stagger: {{ min($loop->index, 12) * 45 }}ms"
            >

                <a
                    class="rose-image-wrap"
                    href="{{ $rose->shop_url ?: 'https://www.roses.co.uk/' }}"
                    aria-label="View {{ $rose->name }}"
                >

                    <span class="rose-card-badge">
                        {{ $rose->type }}
                    </span>

                    <img
                        src="{{ $rose->image_url }}"
                        alt="{{ $rose->name }}"
                        loading="lazy"
                    >

                    <div class="proto-hover-chips">
                        @if($sizeLabel)
                            <span>{{ $sizeLabel }}</span>
                        @endif
                        @if($fragranceLabel)
                            <span>{{ $fragranceLabel }}</span>
                        @endif
                        @if($floweringLabel)
                            <span>{{ $floweringLabel }}</span>
                        @endif
                    </div>

                    <span
                        class="rose-image-arrow"
                        aria-hidden="true"
                    >
                        ↗
                    </span>

                </a>


                <div class="rose-card-body">

                    <span class="rose-card-type">
                        {{ $rose->type }}
                    </span>

                    <h3>
                        {{ $rose->name }}
                    </h3>


                    @if($rose->description)

                        <p>
                            {{ $rose->description }}
                        </p>

                    @endif

                    <div class="proto-product-cues">
                        @if($sizeLabel)
                            <div class="proto-cue-row">
                                <span>Height</span>
                                <div class="proto-height-bar" aria-hidden="true">
                                    <span style="width: {{ ($sizeRank / 5) * 100 }}%"></span>
                                </div>
                                <span>{{ $sizeLabel }}</span>
                            </div>
                        @endif

                        @if($fragranceLabel)
                            <div class="proto-cue-row">
                                <span>Fragrance</span>
                                <div class="proto-fragrance-dots" aria-label="{{ $fragranceLabel }}">
                                    @for($i = 1; $i <= 3; $i++)
                                        <span class="{{ $i <= $fragranceRank ? 'is-on' : '' }}"></span>
                                    @endfor
                                </div>
                            </div>
                        @endif

                        @if($floweringLabel)
                            <span class="proto-flowering-badge">
                                {{ $floweringLabel }}
                            </span>
                        @endif
                    </div>

                    @if(count($matchReasons))
                        <p class="proto-match-reasons">
                            Matches: {{ implode(' · ', $matchReasons) }}
                        </p>
                    @elseif($hasFilters)
                        <p class="proto-match-reasons">
                            Matches your selected criteria
                        </p>
                    @endif

                    <button
                        type="button"
                        class="proto-compare-btn"
                        data-proto-compare
                        aria-pressed="false"
                    >
                        Compare
                    </button>


                    <div class="rose-card-footer">

                        @if($rose->price)

                            <span class="rose-price">
                                {{ Number::currency(
                                    (float) $rose->price,
                                    'GBP'
                                ) }}
                            </span>

                        @else

                            <span></span>

                        @endif


                        <a
                            class="view-rose"
                            href="{{ $rose->shop_url ?: 'https://www.roses.co.uk/' }}"
                        >

                            <span>
                                View rose
                            </span>

                            <span aria-hidden="true">
                                →
                            </span>

                        </a>

                    </div>

                </div>

            </article>

        @endforeach

    </div>


    @if($roses->hasPages())

        <nav
            class="finder-pagination"
            aria-label="Rose finder pages"
        >
            {{ $roses->links('vendor.pagination.rose-finder') }}
        </nav>

    @endif

@endif
