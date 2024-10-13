@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span><i class="flaticon-left-arrow"></i></span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" ><i class="flaticon-left-arrow"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span style="
                            color: white;
                            background: black;
                            font-size: 16px;
                            border: 1px solid #e7e7e7;
                            text-transform: uppercase;
                            -webkit-transition: all 0.5s;
                            -o-transition: all 0.5s;
                            -ms-transition: all 0.5s;
                            -moz-transition: all 0.5s;
                            transition: all 0.5s;
                            width: 50px;
                            height: 50px;
                            line-height: 35px;
                            -webkit-border-radius: 10px;
                            -moz-border-radius: 10px;
                            border-radius: 10px;
                            text-align: center;
                            margin-right: 10px;
                        ">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="flaticon-right-arrow"></i></a></li>
        @else
            <li class="disabled"><span><i class="flaticon-right-arrow"></i></span></li>
        @endif
    </ul>
@endif
