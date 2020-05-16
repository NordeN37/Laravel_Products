@if($data->count() > 0)
    <section class="pt-3 pb-5" id="main_popular">
        <h2>{{ __('My Page') }}</h2>
        <div class="row">
            @foreach($data as $post)
                <div class="col-12 col-md-6 col-lg-4 post-card">
                    <div class="card popular--card">
                        <img class="card-img-top" alt="{{ $post->title }}" src="storage/{{ $post->image }}" />
                    </div>
                    <div class="card-body px-0">
                        <a href="{{ route('post', $post->slug) }}" title="{{ ($post->seo_title) ? $post->seo_title : $post->title  }}" class="card-title stretched-link">
                            {{ $post->title  }}
                        </a>
                        <p class="card-text">{{ mb_strimwidth($post->excerpt,0, setting('site.crossTextLenth'), '...') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
