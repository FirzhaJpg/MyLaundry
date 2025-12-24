@if ($paginator->hasPages())
    <nav aria-label="Pagination">
        <ul class="ml-pagination__list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="ml-pagination__item is-disabled" aria-disabled="true"><span>&laquo;</span></li>
            @else
                <li class="ml-pagination__item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="ml-pagination__item is-disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="ml-pagination__item is-active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="ml-pagination__item"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="ml-pagination__item"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="ml-pagination__item is-disabled" aria-disabled="true"><span>&raquo;</span></li>
            @endif
        </ul>
    </nav>
@endif
