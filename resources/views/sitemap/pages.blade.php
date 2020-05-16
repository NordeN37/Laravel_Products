<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($pages as $page)
        <url>
            <loc>{{url("/")}}{{ $page->path() }}</loc>
            <lastmod>{{ $page->updated_at->toAtomString() }}</lastmod>
            <changefreq>{{ ( $page->path() == '/'.setting('site.new_page', 'news') ? setting('site.newsChangefreq', 'daily') : 'monthly' ) }}</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach
</urlset>
