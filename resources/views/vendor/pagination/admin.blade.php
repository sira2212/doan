@if ($paginator->lastPage() > 1)  {{-- Only display pagination if there are multiple pages --}}
<nav aria-label="Page navigation">
    <ul class="pagination" style="justify-content: center; padding: 25px;">
        {{-- Previous Page Link --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }} prev">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-disabled="{{ $paginator->onFirstPage() }}">
                <i class="tf-icon bx bx-chevrons-left"></i>
            </a>
        </li>

        {{-- Pagination Elements --}}
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            <li class="page-item {{ $paginator->currentPage() == $page ? 'active' : '' }}">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach

        {{-- Next Page Link --}}
        <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }} next">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-disabled="{{ !$paginator->hasMorePages() }}">
                <i class="tf-icon bx bx-chevrons-right"></i>
            </a>
        </li>
    </ul>
</nav>
@endif
