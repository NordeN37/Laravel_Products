@extends('layouts.app', ['class' => 'bg-default', 'og' => 'prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#"'])

@section('title', 'mail')

@section('css')@endsection

@section('meta')

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
            <form action="{{ route('createZakaz') }}" method="POST">
                @csrf
                <input type="email"  name="email" placeholder="email"><br/>
                <input type="text"   name="name" placeholder="name"><br/>
                <input type="text"   name="size" placeholder="size"><br/>
                <input type="number" name="price" placeholder="price"><br/>
                <input type="checkbox" name="paid" placeholder="paid"><br/>
                <input type="checkbox" name="shipped" placeholder="shipped"><br/>
                <input type="tel" name="phone" placeholder="phone"><br/>
                <input type="text" name="country" placeholder="country"><br/>
                <input type="text" name="city" placeholder="city"><br/>
                <input type="text" name="street" placeholder="street"><br/>
                <input type="text" name="home" placeholder="home"><br/>
                <input type="text" name="flat" placeholder="flat"><br/>
                <input type="text" name="order_number" placeholder="order_number"><br/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
@endsection

@section('js')

@endsection

@section('footer')
    @include('layouts.footers.nav', ['analytics' => true])
@endsection
