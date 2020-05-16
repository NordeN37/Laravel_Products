<div class="container ">
    <div class="row d-none"> <ul class="d-inline-block"> </ul> </div>
    <div class="row py-2">
        <div class="col-6 col-sm-3 col-md-3 col-lg-3">
            <div class="">
                <a href="{{env('APP_URL')}}" title="{{ setting('site.title', 'site title') }}">
                    <img src="/storage/{{setting('site.logoWhite')}}" class="img-fluid logo logo-white" alt="{{ setting('site.title', 'site title') }}"/>
                </a>
            </div>
        </div>
        <div class="col-6 col-sm-3 col-md-3 col-lg-2 weather">
            <div class="mt-2">
                <div id="Oplao" data-cl="black" data-id="62441" data-wd="152px" data-hg="66px" data-l="ru" data-c="555312" data-t="C" data-w="m/s" data-p="hPa" data-wg="widget_3" class="150 60 mt-1"></div>
            </div>
        </div>
        {{--<div class="col-12 col-sm-6 px-0 px-sm-1 mb-1 mb-sm-0 col-md-6 col-lg-4">
            {{setting('site.headerLine')}}
        </div> --}}
    </div>
</div>

