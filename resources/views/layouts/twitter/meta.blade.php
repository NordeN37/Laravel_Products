@if( setting('site.twitter_card') )<meta name="twitter:card" content="{{ setting('site.twitter_card') }}">
    <meta name="twitter:domain" content="{{config('app.url')}}">
@if( setting('site.twitter_site') )
    <meta name="twitter:site" content="{{'@' . setting('site.twitter_site') }}">
    <meta name="twitter:creator" content="{{'@' .setting('site.twitter_site')}}">
@endif
    <meta name="twitter:title" content="{{$data->title}}">
    <meta name="twitter:description" content="{{$data->meta_description}}">
    <meta name="twitter:url" content="{{config('app.url')}}/{{$data->slug}}">@endif