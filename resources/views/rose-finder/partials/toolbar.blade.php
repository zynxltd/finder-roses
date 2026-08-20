@if($hasFilters)

    <a
        class="clear-filters"
        href="{{ route('rose-finder') }}"
    >
        <span aria-hidden="true">↺</span>
        Clear all
    </a>

@endif
