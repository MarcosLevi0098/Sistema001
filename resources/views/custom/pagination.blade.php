@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous page link--}}
        @if ($paginator->onFirstPage())
        <li class="disabled"><i class="material-icons">chevron_left</i></li>
        @else
        <li class="waves-effect"><a href="{{$paginator->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a></li>    
        @endif

        {{--Paginator Elements--}}
        @foreach ($elements as $element)
        {{--Tree Dots Separator--}}
            @if (is_string($element))
                <li class="disabled">{{$element}}</li>
            @endif

            {{--Array of links--}}
            @if (is_array($element))

            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active">
                        <a href="">{{$page}}</a>
                    </li>
                    @else
                    <li class="waves-effect"><a href="" class="page-link" href="{{$url}}"></a>{{$page}}</li>
                @endif
            @endforeach    
            @endif
        @endforeach

        {{--Next Page Link--}}
        @if ($paginator->hasMorePages())
            <li class="waves-effect"><a href="{{$paginator->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a></li>
        @else
            <li class="disabled"><a href="{{$paginator->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
@endif