<footer id="footer" class="container-fluid pt-3 pb-3">
    <div class="row footer-cols">
        <div class="container">
            <div class="row">
                {!! setting('site.footerCol1') !!}
                {!! setting('site.footerCol2') !!}
                {!! setting('site.footerCol3') !!}
                {!! setting('site.footerCol4') !!}
            </div>
        </div>
    </div>
    <div class="row footer-bottom_line">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    @if(setting('site.siteAddress') !='') <address>{{ setting('site.siteAddress') }}</address> @endif
                    <a href="{{config('app.url')}}" class="small" title="{{setting('site.site_seo_end_title')}}">{{--<img class="footer-logo" src="/img/logo.svg">--}}<div class="clear clearfix"></div><span class="footer-site_title small">{{setting('site.site_seo_end_title')}}</span></a> <div class="clear clearfix"></div> <span class="small"><small>&#169; {{ (date('Y') != setting('site.siteStart') ) ? setting('site.siteStart') .'...'. date('Y') : setting('site.siteStart') }} {!!  setting('site.siteCopyright') !!}</small></span>

                </div>
                <div class="col-12 col-md-4 text-right">
                    <div class="float-right">
                        @include('layouts.headers.socials')
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
<!--noindex--><a href="javascript:void(0);" id="scroll_top" title="{{__('to top')}}" class="d-none"><span class="scroll-icon_block"><span class="scroll-icon"><i class="fa fa-long-arrow-up"></i> <span class="scroll-top_text">{{__('to top')}}</span></span></span></a><!--/noindex-->
@if( $analytics)
{!! setting('site.analytics') !!}
@endif