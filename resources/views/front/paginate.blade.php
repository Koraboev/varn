<nav aria-label="Page navigation example" class="text-center mb-40  ">
    <ul class="pagination justify-content-center">
        <li class="page-item {{ $items->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $items->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>

        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                <a class="page-link" href="{{ $items->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{ $items->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $items->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

