@if($chips)

    <div class="active-filters">

        <span class="active-filters-label">
            Your selection
        </span>

        <ul class="active-chips">

            @foreach($chips as $chip)

                <li>

                    <a href="{{ $chip['url'] }}">

                        <span>
                            {{ $chip['label'] }}
                        </span>

                        <span
                            class="chip-remove"
                            aria-hidden="true"
                        >
                            ×
                        </span>

                        <span class="visually-hidden">
                            Remove {{ $chip['label'] }}
                        </span>

                    </a>

                </li>

            @endforeach

        </ul>

    </div>

@endif
