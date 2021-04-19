@if ($paginator->hasPages())
    <nav aria-label="Page navigation example" class="pagination justify-content-center">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item custom-page-item disabled mr-2" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a aria-label="Next" class="page-link shadow"><span aria-hidden="true"><i class="fal fa-angle-left"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item custom-page-item mr-2" aria-label="@lang('pagination.previous')">
                    <a class="page-link shadow" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <span>
                            <i class="fal fa-angle-left"></i>
                        </span>
                    </a>
                </li>
            @endif
            
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item custom-page-digits active mr-2"><span class="page-link shadow">{{ $page }}</span></li>
                        @else
                            <li class="page-item custom-page-digits mr-2"><a href="{{ $url }}" class="page-link shadow">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item custom-page-digits">
                    <a class="page-link shadow" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><span>
                            <i class="fal fa-angle-right"></i>
                        </span></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true"><i class="fal fa-angle-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif