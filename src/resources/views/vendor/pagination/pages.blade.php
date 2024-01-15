<style>
    .pagination {
        display: flex;
    }

    li {
        color: #8B7969;
        border: 1px solid #E0DFDE;
        height: 30px;
        width: 30px;
        text-align: center;
        line-height: 26px;
        font-size: 20px;
        font-family: 'Inika', serif;
    }

    li:first-child {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }

    li:last-child {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }

    li:first-child,
    li:last-child {
        font-size: 35px;
    }

    a {
        text-decoration: none;
        color: #8B7969;
    }

    .active {
        background-color: #8B7969;
        color: #fff;
        border: 1px solid #8B7969;
    }
</style>

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    {{-- "Three Dots" Separator --}}
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            {{-- 最初のページ以降 --}}
                            @if ($page <= 3 || $page == $paginator->lastPage())
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @elseif ($page == 4)
                                {{-- 4ページ目の場合は '...' を表示 --}}
                                <li class="disabled" aria-disabled="true"><span>...</span></li>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach



            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif

        </ul>
    </nav>
@endif
