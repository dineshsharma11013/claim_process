<div class="dataTables_paginate paging_simple_numbers" style="float: right;">
@if ($paginator->hasPages())
    <ul class="pagination">
       
        @if ($paginator->onFirstPage())
            <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
        @else
            <li class="paginate_button page-item previous"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="paginate_button page-item previous disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="paginate_button page-item"><a href="{{ $url }}" aria-controls="example2" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li class="paginate_button page-item next"><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
        @else
            <li class="paginate_button page-item next disabled"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
        @endif
    </ul>
@endif 

</div>