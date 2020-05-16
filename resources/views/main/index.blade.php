@extends('layouts.app', ['class' => 'bg-default', 'og' => 'prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#"'])
@if(Request::url() === route('category', $index->slug))
    @section('title',  $index->name.' - '. setting('site.site_seo_end_title'))
@else
    @section('title',  $index->title.' - '. setting('site.site_seo_end_title'))
@endif
@section('css')@endsection

@section('meta')
    <link rel="canonical" href="{{config('app.url')}}">
    <meta name="description" content="{{$index->meta_description}}">
    <meta name="keywords" content="{{$index->meta_keywords}}">
    <meta property="og:title" content="@if(Request::url() === route('category', $index->slug)){{$index->name}}@else{{$index->title}}@endif" >
    <meta property="og:description" content="{{$index->meta_description}}">
    <meta property="og:site_name" content="{{ setting('site.title', config('app.name') ) }}" >
    <meta property="og:type" content="website" >
    <meta property="og:url" content="{{config('app.url')}}" >
    <meta property="og:image" content="{{config('app.url')}}/storage/{{$index->image}}" >
    @if( setting('site.twitter_card') )
    <meta name="twitter:card" content="{{ setting('site.twitter_card') }}">
    <meta name="twitter:domain" content="{{config('app.url')}}">
    @if( setting('site.twitter_site') )
    <meta name="twitter:site" content="{{'@' . setting('site.twitter_site') }}">
    <meta name="twitter:creator" content="{{'@' .setting('site.twitter_site')}}">
    @endif
    <meta name="twitter:title" content="@if(Request::url() === route('category', $index->slug)){{$index->name}}@else{{$index->title}}@endif">
    <meta name="twitter:description" content="{{$index->meta_description}}">
    <meta name="twitter:url" content="{{config('app.url')}}">
    @endif
@endsection
@section('header')
    @include('layouts.headers.header')
@endsection
@section('topmenu')
    @include('layouts.navbars.topmenu')
@endsection
@section('nav')
    @include('layouts.navbars.navbar')
@endsection
@section('content')
    <main id="main" class="container index-page">
        <div class="row">
            @include('layouts.sidebar.sidebar')
            <div class="col-12">
                @if(Request::url() === route('index'))
                    @include('main.moduels.postsAll',        ['data' => $postAll])
                @elseif(Request::url() === route('post', $index->slug))
                    @include('main.moduels.postOne')
                @elseif(Request::url() === route('category', $index->slug))
                    @include('main.moduels.categories',      ['data' => $postAll])
                @endif
            </div>

            <div class="col-12 mt-5">
                {!! $index->body !!}
            </div>
        </div>
    </main>
@endsection

@section('js')

@endsection

@section('footer')
    @include('layouts.footers.nav', ['analytics' => true])
@endsection
