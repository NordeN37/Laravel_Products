<ul class="navbar-nav mr-auto" itemprop="about" itemscope itemtype="http://schema.org/ItemList">
    @foreach($items as $menu_item)
        <li class="nav-item @if($menu_item->children) dropdown @endif"><a title="{{ $menu_item->title }}" itemprop="itemListElement" class="nav-link @if($menu_item->children->count() > 0) dropdown-toggle @endif {{ Request::path() == $menu_item->url ? 'active' : '' }}" href="{{ env('APP_URL').'/'.$menu_item->link() }}" @if($menu_item->children->count() > 0) itemscope itemtype="http://schema.org/ItemList" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif >{{ $menu_item->title }}</a>
            <meta itemprop="name" content="{{ $menu_item->title }}" />
            @if($menu_item->children->count() > 0)
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($menu_item->children as $menu_children)
                        <a class="dropdown-item" itemprop="itemListElement" href="{{ env('APP_URL').'/'.$menu_children->link() }}">{{ $menu_children->title }}</a>
                    @endforeach
                </div>
            @endif
        </li>
    @endforeach
</ul>