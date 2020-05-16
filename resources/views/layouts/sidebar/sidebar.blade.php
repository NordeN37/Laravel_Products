<aside id="sidebar" class="col-12 col-md-3 sidebar">
    @if(setting('site.sitebarAd'))
        {!! setting('site.sitebarAd') !!}
    @endif
   {{-- <h5 class="calendar_h3 mt-3 text-center"><a href="/category/calendar" title="{{__('events calendar title')}}">{{__('events calendar')}}</a></h5>
        <div id="js-calendar" data-currentYear="2020" data-startYear="2020" data-currentMonth="7" data-startMonth="7"></div> --}}

    @if( !empty( $sidebarPosts))
            <h5 class="sitebar--video_h5 mt-3"><a href="/category/video" class="sitebar--video_h5_link" title="{{ __('video h3 title') }}" >{{ __('video h3') }}</a></h5>
        @foreach( $sidebarPosts as $post)
                <a href="{{ $post->path() }}" class="sitebar--video_link d-block mb-4" title="{{ $post->title }}">
                <div class="sitebar--video_title">{{ $post->title  }}</div>
                <!--noindex--><ul class="list-group list-group-flush card-list-group my-0 py-0">
                    <li class="list-group-item px-0 ml-0 border-0 flex-icons-line py-1">
                       <span class="big-preview__views"><span class="big-preview__views_text"></span> <i class="fa fa-eye big-preview__views_icon ml-0"></i> <span class="big-preview__views_count">{{$post->viewsFormated()}}</span></span>
                       <span class="big-preview__date float-right ml-auto"><time class="big-preview__datetime" datetime="{{ $post->datetimeFormated() }}" >{{ $post->createdAtFormated() }}</time></span>
                    </li>
                </ul><!--/noindex-->
                <div class="sitebar--video position-relative mb-3">
                    <div class="">
                        <div href="{{ $post->path() }}" class="sitebar--video_link youtube-preview_image" title="{{ $post->title }}">
                            <img class="card-img-top img-fluid" alt="{{ $post->title }}" src="{{ ($post->preview == 'YOUTUBE' && $post->youtube) ? '//img.youtube.com/vi/'.$post->youtube.'/maxresdefault.jpg' : Voyager::image( $post->thumbnail('small')) }}" />
                        </div>
                    </div>
                </div>
                </a>
        @endforeach
    @endif

</aside>
