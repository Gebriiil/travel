

<div class="c_pagination clearfix padd-120">
    @if ($paginator->hasPages())
        <ul class="pagination cp_content color-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled ">
                    <a class="page-link" aria-label="Previous">
                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item "><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev"><i class="fa fa-angle-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}<span class="sr-only">(current)</span></a>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item "><a href="{{ $paginator->nextPageUrl() }}" class="page-link"
                                          rel="next"><i class="fa fa-angle-right"></i></a>
                </li>
            @else
                <li class="page-item disabled">
                    <a aria-label="Next">
                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @endif
        </ul>
    @endif

</div>

