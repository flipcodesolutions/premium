{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($staticUrls as $item)
    <url>
        <loc>{{ $item['loc'] }}</loc>
        <lastmod>{{ now()->tz('UTC')->toDateString() }}</lastmod>
        <changefreq>{{ $item['changefreq'] }}</changefreq>
        <priority>{{ $item['priority'] }}</priority>
    </url>
@endforeach
@foreach($services as $service)
    <url>
        <loc>{{ $baseUrl }}/services/{{ $service->slug }}</loc>
        <lastmod>{{ ($service->updated_at ?? now())->tz('UTC')->toDateString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
@foreach($posts as $post)
    <url>
        <loc>{{ $baseUrl }}/blog/{{ $post->slug }}</loc>
        <lastmod>{{ ($post->updated_at ?? $post->published_at ?? now())->tz('UTC')->toDateString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
@endforeach
</urlset>
