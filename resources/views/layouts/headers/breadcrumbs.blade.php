<div class="container mt-1 mt-md-2 mb-1 mb-md-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 pb-0 pt-0 pt-md-1">
            @foreach($breadcrumbs as $breadcrumb)
                @if( $breadcrumb['link'])
                    <li class="breadcrumb-item @if($loop->first) breadcrumb-home_li @endif" ><a href="{{$breadcrumb['link'] }}" class="breadcrumb_link"><span class="@if($loop->first) breadcrumb-home_span @endif">{{$breadcrumb['title']}}</span></a></li>
                @else
                    <li class="breadcrumb-item active breadcrumb-last" @if($breadcrumb['isLast']) aria-current="page" @endif >{{$breadcrumb['title']}}</li>
                @endif
            @endforeach
        </ol>
    </nav>
</div>
