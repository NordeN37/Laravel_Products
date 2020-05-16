{{--@if(!app('request')->input('page') != '' || app('request')->input('page') == '1')
     <link rel="next" href="{{$fullUrl}}?page=2" />
@else
    @if( app('request')->input('page') == '2')
        <link rel="prev" href="{{$fullUrl}}" />
    @else
        <link rel="prev" href="{{$fullUrl}}?page={{app('request')->input('page')-1}}" />
    @endif
        <link rel="next" href="{{$fullUrl}}?page={{app('request')->input('page')+1}}" />
@endif
--}}
