<div id="newapp" class="menu-container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="{{ route('index') }}">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        @foreach($categories as $category)
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active" href="{{ route('category', $category->slug )}}">{{ $category->name }} <span class="sr-only">(current)</span></a>
                        </div>
                        @endforeach
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <cart-dropdown></cart-dropdown><b class="caret"></b></a>
                        </li>
                    </ul>
                    <div class="collapse navbar-collapse">
                        <p>{{$temporaryUs}}</p>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
