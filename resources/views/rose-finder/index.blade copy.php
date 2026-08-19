@extends('layouts.app')

@section('title', 'Rose Finder')

@section('content')
<section class="plant-finder is-horizontal" data-finder data-default-layout="horizontal">
    <div class="plant-finder-intro">
        <p class="eyebrow">Harkness Roses</p>
        <h1>Rose Finder</h1>
        <p>Tap the icons that match your garden — as many as you like — and we’ll show the Harkness roses that fit. You can keep the filters across the top, or switch them to a side column.</p>
    </div>

    <div class="finder-toolbar">
        <p class="result-count">
            <strong>{{ $roses->total() }}</strong>
            {{ Str::plural('rose', $roses->total()) }} found matching your chosen criteria
        </p>

        <div class="toolbar-actions">
            @if($hasFilters)
                <a class="clear-filters" href="{{ route('rose-finder') }}">Clear all filters</a>
            @endif

            <div class="layout-toggle" role="group" aria-label="Filter layout">
                <button type="button" class="layout-toggle-button" data-layout="horizontal" aria-pressed="true">
                    Across the top
                </button>
                <button type="button" class="layout-toggle-button" data-layout="sidebar" aria-pressed="false">
                    On the side
                </button>
            </div>
        </div>
    </div>

    @if($chips)
        <ul class="active-chips">
            @foreach($chips as $chip)
                <li>
                    <a href="{{ $chip['url'] }}">
                        {{ $chip['label'] }}
                        <span aria-hidden="true">×</span>
                        <span class="visually-hidden">Remove {{ $chip['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <div class="plant-finder-layout">
        <aside class="plant-finder-filters">
            <form method="GET" action="{{ route('rose-finder') }}" data-finder-form>
                <div class="filter-selects">
                    <label class="filter-select">
                        <span>
                            <img src="{{ asset('images/finder/height.png') }}" alt="" width="22" height="22">
                            Size
                        </span>
                        <select name="size">
                            <option value="">Any size</option>
                            @foreach($sizes as $value => $label)
                                <option value="{{ $value }}" @selected($filters['size'] === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label class="filter-select">
                        <span>Colour</span>
                        <select name="colour">
                            <option value="">Any colour</option>
                            @foreach($colours as $value => $label)
                                <option value="{{ $value }}" @selected($filters['colour'] === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <h2>Select rose characteristics</h2>
                <p class="filter-hint">You can filter by:</p>

                @foreach($groups as $group)
                    <fieldset class="characteristic-group">
                        <legend>{{ $group['title'] }}</legend>
                        <div class="characteristic-grid">
                            @foreach($group['options'] as $option)
                                @php($isSelected = in_array($option['value'], $filters[$group['key']], true))
                                <label class="characteristic {{ $isSelected ? 'is-selected' : '' }}">
                                    <input
                                        type="checkbox"
                                        name="{{ $group['key'] }}[]"
                                        value="{{ $option['value'] }}"
                                        @checked($isSelected)
                                    >
                                    <img src="{{ asset('images/finder/'.$option['icon']) }}" alt="" width="56" height="56">
                                    <span>{{ $option['label'] }}</span>
                                </label>
                            @endforeach
                        </div>
                    </fieldset>
                @endforeach
            </form>
        </aside>

        <div class="plant-finder-results">
            @if($roses->isEmpty())
                <div class="empty-results">
                    <h2>No roses match those filters</h2>
                    <p>Remove a characteristic using the tags above, or start again with a broader size or colour.</p>
                    <a class="primary-button inline-button" href="{{ route('rose-finder') }}">Clear all filters</a>
                </div>
            @else
                <div class="results-grid">
                    @foreach($roses as $rose)
                        <article class="rose-card">
                            <div class="rose-image-wrap">
                                <img src="{{ $rose->image_url }}" alt="{{ $rose->name }}" loading="lazy">
                            </div>
                            <div class="rose-card-body">
                                <span class="rose-type">{{ $rose->type }}</span>
                                <h2>{{ $rose->name }}</h2>
                                <p>{{ $rose->description }}</p>
                                <div class="rose-card-footer">
                                    @if($rose->price)
                                        <strong>{{ Number::currency((float) $rose->price, 'GBP') }}</strong>
                                    @endif
                                    <a class="view-rose" href="{{ $rose->shop_url ?: 'https://www.roses.co.uk/' }}">View rose</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if($roses->hasPages())
                    <div class="finder-pagination">
                        {{ $roses->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>
@endsection
