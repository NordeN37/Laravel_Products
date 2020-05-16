<ul class="navbar-nav mr-auto" itemprop="about" itemscope itemtype="http://schema.org/ItemList">
    @foreach($items as $menu_item)
        <li class="nav-item dropdown megamenu-li">
            <a title="{{ $menu_item->title }}" itemprop="itemListElement" id="{{ studly_case( $menu_item->link() ) }}" class="nav-link @if($loop->first) first @endif @if($menu_item->children->count() > 0) dropdown-toggle @endif {{ Request::path() == $menu_item->url ? 'active' : '' }}" href="{{ env('APP_URL').'/'.$menu_item->link() }}" @if($menu_item->children->count() > 0) itemscope itemtype="http://schema.org/ItemList" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif >{{ $menu_item->title }}</a>
            <meta itemprop="name" content="{{ $menu_item->title }}" />
            @if($menu_item->children->count() > 0)
                <div class="dropdown-menu megamenu border-0 rounded-0" aria-labelledby="{{ studly_case( $menu_item->link() ) }}">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            @foreach($menu_item->children as $menu_children)
                                @if($loop->count > 5 && $loop->index != 0 && $loop->index % setting('site.menuItems', 5) == 0)</div><div class="col-sm-6 col-lg-3">@endif
                                <a class="dropdown-item" itemprop="itemListElement" href="{{ env('APP_URL').'/'.$menu_children->link() }}">{{ $menu_children->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </li>
    @endforeach
</ul>
