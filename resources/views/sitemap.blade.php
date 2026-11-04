{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<!-- Core Company & Service Landing Pages -->
@foreach($corePages as $item)
<url>
    <loc>{{ $item['loc'] }}</loc>
    <lastmod>{{ $item['lastmod'] }}</lastmod>
    <changefreq>{{ $item['changefreq'] }}</changefreq>
    <priority>{{ $item['priority'] }}</priority>
</url>
@endforeach
<!-- Core Inspection Services -->
@foreach($servicePages as $item)
<url>
    <loc>{{ $item['loc'] }}</loc>
    <lastmod>{{ $item['lastmod'] }}</lastmod>
    <changefreq>{{ $item['changefreq'] }}</changefreq>
    <priority>{{ $item['priority'] }}</priority>
</url>
@endforeach
<!-- Published Blog Articles & Inspection Guides -->
@foreach($blogPages as $item)
<url>
    <loc>{{ $item['loc'] }}</loc>
    <lastmod>{{ $item['lastmod'] }}</lastmod>
    <changefreq>{{ $item['changefreq'] }}</changefreq>
    <priority>{{ $item['priority'] }}</priority>
</url>
@endforeach
</urlset>
