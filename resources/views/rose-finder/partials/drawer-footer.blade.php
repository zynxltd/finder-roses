<div class="drawer-result-summary">

    <strong>
        {{ $roses->total() }}
    </strong>

    <span>
        {{ Str::plural('rose', $roses->total()) }} found
    </span>

</div>


@if($hasFilters)

    <a
        href="{{ route('rose-finder') }}"
        class="drawer-clear"
    >
        Clear all
    </a>

@endif


<button
    type="button"
    class="drawer-done"
    data-filter-close
>

    <span>
        View results
    </span>

    <span aria-hidden="true">
        →
    </span>

</button>
