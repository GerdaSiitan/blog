@if ($paginator->hasPages())
    <div class="join grid grid-cols-2">
        
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="disabled" aria-disabled="true"></button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn btn-outline" rel="prev">Previous Page</a>
            @endif
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="join-item btn btn-outline" >Next Page</a>
            @else
                <a class="disabled" aria-disabled="true" class="join-item btn btn-outline"></a>
            @endif
        
    </div>
@endif