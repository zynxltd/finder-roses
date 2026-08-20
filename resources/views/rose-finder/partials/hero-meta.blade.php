<span>
    <strong>{{ $roses->total() }}</strong>
    {{ Str::plural('rose', $roses->total()) }}
</span>

@if($hasFilters)

    <span class="meta-divider"></span>

    <a href="{{ route('rose-finder') }}">
        Reset your search
    </a>

@endif
