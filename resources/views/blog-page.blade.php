@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog — Clever CMS</title>

<body>

<!-- ════════════════ BLOG HERO ════════════════ -->
<section class="blog-hero">
  <div class="container">
    <div class="blog-hero-inner">
      <span class="tag animate-up">
        <svg width="10" height="10" viewBox="0 0 10 10" style="fill:var(--brand)"><circle cx="5" cy="5" r="5"/></svg>
        Clever CMS Blog
      </span>
      <h1 class="blog-hero-title animate-up delay-1">
        Stories, Guides &amp; <span class="highlight">Updates</span>
      </h1>
      <p class="blog-hero-sub animate-up delay-2">
        Tips on content workflows, product news, and lessons from teams publishing smarter with Clever CMS.
      </p>

      <div class="blog-controls animate-up delay-3">
        <div class="blog-search">
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" placeholder="Search articles...">
        </div>

        <div class="blog-filters">
          <button class="filter-pill active">All Posts</button>
          <button class="filter-pill">Technology</button>
          <button class="filter-pill">Marketing</button>
          <button class="filter-pill">Business</button>
          <button class="filter-pill">Tutorials</button>
          <button class="filter-pill">News</button>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════ BLOG GRID ════════════════ -->
<section class="blog-grid-section">
  <div class="container">
    <div class="blog-grid">
       @foreach($blogs as $blog)
         <a href="{{ route('blog.show', $blog->slug) }}" class="blog-card">
          <div class="blog-card-thumb thumb-green">
          <span class="blog-card-cat">
            {{ $blog->category }}
          </span>
              @if($blog->featured_image)
               <img src="{{ asset('storage/' . $blog->featured_image) }}"
                 alt="{{ $blog->title }}"
                 class="blog-thumb-image">
              @else
                <svg viewBox="0 0 24 24">
                 <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                 <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                </svg>
              @endif
          </div>
  <div class="blog-card-body">

        <h3 class="blog-card-title">
            {{ $blog->title }}
        </h3>

        <p class="blog-card-desc">
            {{ $blog->description }}
        </p>

        <div class="post-meta">

            <div class="post-avatar">
                {{ strtoupper(substr($blog->author ?? 'Admin', 0, 2)) }}
            </div>

            <div class="post-meta-text">
                <strong>{{ $blog->author ?? 'Admin' }}</strong>
                <span class="post-meta-dot">·</span>

                {{ $blog->created_at->format('M d, Y') }}
            </div>

        </div>

    </div>
</a>
@endforeach
    </div>

@if ($blogs->hasPages())
<div class="blog-pagination">

    {{-- Previous --}}
    @if ($blogs->onFirstPage())
        <span class="page-btn nav disabled">
            <svg viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
        </span>
    @else
        <a href="{{ $blogs->previousPageUrl() }}" class="page-btn nav">
            <svg viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
        </a>
    @endif

    @for ($i = 1; $i <= $blogs->lastPage(); $i++)
        <a href="{{ $blogs->url($i) }}"
           class="page-btn {{ $blogs->currentPage() == $i ? 'active' : '' }}">
            {{ $i }}
        </a>
    @endfor

    {{-- Next --}}
    @if ($blogs->hasMorePages())
        <a href="{{ $blogs->nextPageUrl() }}" class="page-btn nav">
            <svg viewBox="0 0 24 24">
                <path d="M9 18l6-6-6-6"/>
            </svg>
        </a>
    @else
        <span class="page-btn nav disabled">
            <svg viewBox="0 0 24 24">
                <path d="M9 18l6-6-6-6"/>
            </svg>
        </span>
    @endif

</div>
@endif
  </div>
</section>


<!-- ════════════════ NEWSLETTER CTA ════════════════ -->
<section class="newsletter-section">
  <div class="container">
    <div class="newsletter-inner">
      <div class="newsletter-tag">
        <svg width="8" height="8" viewBox="0 0 8 8" style="fill:#fff"><circle cx="4" cy="4" r="4"/></svg>
        Stay in the Loop
      </div>
      <h2 class="newsletter-title">Get Our Best Posts<br/>Straight to Your Inbox</h2>
      <p class="newsletter-sub">One email a week. No spam, no fluff — just the guides and updates worth reading.</p>

      <form class="newsletter-form">
        <input type="email" placeholder="you@company.com" required>
        <button type="submit" class="btn-newsletter">Subscribe</button>
      </form>
      <p class="newsletter-note">Join 4,200+ teams already subscribed · Unsubscribe anytime</p>
    </div>
  </div>
</section>


</html>

@endsection