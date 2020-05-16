<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @for($i = 1; $i<=$pages_count; $i++)
        <sitemap>
            <loc>{{ url('sitemap/pages') }}{{($i !== 1) ? '?p='.$i : ''  }}</loc>
            <lastmod>{{ $page->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endfor
    @for($i = 1; $i<=$posts_count; $i++)
    <sitemap>
        <loc>{{ url('sitemap/posts') }}{{($i !== 1) ? '?p='.$i : ''  }}</loc>
        <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
    </sitemap>
    @endfor
    @for($i = 1; $i<=$categories_count; $i++)
    <sitemap>
        <loc>{{ url('sitemap/categories') }}{{($i !== 1) ? '?p='.$i : ''  }}</loc>
        <lastmod>{{ $category->updated_at->toAtomString() }}</lastmod>
    </sitemap>
    @endfor
</sitemapindex>
