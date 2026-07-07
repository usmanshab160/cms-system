<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <!-- Home -->
    <url>
        <loc>{{ url('/') }}</loc>
    </url>

    <!-- Blogs -->
    <url>
        <loc>{{ url('/blogs') }}</loc>
    </url>

        <!-- Pricing -->
    <url>
        <loc>{{ url('/pricing') }}</loc>
    </url>

    <!-- About -->
    <url>
        <loc>{{ url('/about') }}</loc>
    </url>

    <!-- Contact -->
    <url>
        <loc>{{ url('/contact') }}</loc>
    </url>

    <!-- Blogs -->
    @foreach($blogs as $blog)
        <url>
            <loc>{{ url('/blog/' . $blog->slug) }}</loc>
            <lastmod>{{ $blog->updated_at->toAtomString() }}</lastmod>
        </url>
    @endforeach

</urlset>