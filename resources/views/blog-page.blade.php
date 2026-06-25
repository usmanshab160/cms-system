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


<!-- ════════════════ FEATURED POST ════════════════ -->
<section class="featured-section">
  <div class="container">
    <a href="#" class="featured-card">
      <div class="featured-visual">
        <span class="featured-pill">Featured</span>
        <div class="featured-icon-wrap">
          <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
      </div>
      <div class="featured-body">
        <div class="featured-cat">Product Updates</div>
        <h2 class="featured-title">Introducing Version 3.0: Real-Time Collaboration Is Here</h2>
        <p class="featured-excerpt">Multiple editors, one page, zero conflicts. Here's how our biggest release yet helps teams write, review, and publish together without stepping on each other's drafts.</p>
        <div class="post-meta">
          <div class="post-avatar">AK</div>
          <div class="post-meta-text">
            <strong>Ayesha Khan</strong>
            <span class="post-meta-dot">·</span> Jun 22, 2026
            <span class="post-meta-dot">·</span> 6 min read
          </div>
        </div>
      </div>
    </a>
  </div>
</section>


<!-- ════════════════ BLOG GRID ════════════════ -->
<section class="blog-grid-section">
  <div class="container">
    <div class="blog-grid">

      <a href="#" class="blog-card">
        <div class="blog-card-thumb thumb-green">
          <span class="blog-card-cat">Tutorials</span>
          <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        </div>
        <div class="blog-card-body">
          <h3 class="blog-card-title">10 Drag-and-Drop Tricks Every New Editor Should Know</h3>
          <p class="blog-card-desc">Speed up your workflow with shortcuts and layout tricks most editors don't discover for months.</p>
          <div class="post-meta">
            <div class="post-avatar">MR</div>
            <div class="post-meta-text"><strong>Maya Reyes</strong><span class="post-meta-dot">·</span> Jun 18, 2026</div>
          </div>
        </div>
      </a>

      <a href="#" class="blog-card">
        <div class="blog-card-thumb thumb-orange">
          <span class="blog-card-cat">SEO</span>
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
        <div class="blog-card-body">
          <h3 class="blog-card-title">How to Structure Meta Tags for Better Search Rankings</h3>
          <p class="blog-card-desc">A practical checklist for titles, descriptions, and Open Graph tags that search engines actually reward.</p>
          <div class="post-meta">
            <div class="post-avatar">JS</div>
            <div class="post-meta-text"><strong>Jamal Siddiqui</strong><span class="post-meta-dot">·</span> Jun 15, 2026</div>
          </div>
        </div>
      </a>

      <a href="#" class="blog-card">
        <div class="blog-card-thumb thumb-purple">
          <span class="blog-card-cat">Design</span>
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        </div>
        <div class="blog-card-body">
          <h3 class="blog-card-title">Designing a Visual Hierarchy Readers Actually Follow</h3>
          <p class="blog-card-desc">Why most landing pages fight for attention — and the layout principles that fix it.</p>
          <div class="post-meta">
            <div class="post-avatar">LP</div>
            <div class="post-meta-text"><strong>Liam Park</strong><span class="post-meta-dot">·</span> Jun 11, 2026</div>
          </div>
        </div>
      </a>

      <a href="#" class="blog-card">
        <div class="blog-card-thumb thumb-dark">
          <span class="blog-card-cat">Company News</span>
          <svg viewBox="0 0 24 24"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
        </div>
        <div class="blog-card-body">
          <h3 class="blog-card-title">Clever CMS Raises $12M Series A to Expand Globally</h3>
          <p class="blog-card-desc">The new funding will go toward localization, enterprise features, and a faster publishing pipeline.</p>
          <div class="post-meta">
            <div class="post-avatar">AK</div>
            <div class="post-meta-text"><strong>Ayesha Khan</strong><span class="post-meta-dot">·</span> Jun 08, 2026</div>
          </div>
        </div>
      </a>

      <a href="#" class="blog-card">
        <div class="blog-card-thumb thumb-green">
          <span class="blog-card-cat">Tutorials</span>
          <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        </div>
        <div class="blog-card-body">
          <h3 class="blog-card-title">Automating Your Publishing Workflow with Webhooks</h3>
          <p class="blog-card-desc">Trigger Slack alerts, CDN purges, and analytics events the moment a page goes live.</p>
          <div class="post-meta">
            <div class="post-avatar">MR</div>
            <div class="post-meta-text"><strong>Maya Reyes</strong><span class="post-meta-dot">·</span> Jun 04, 2026</div>
          </div>
        </div>
      </a>

      <a href="#" class="blog-card">
        <div class="blog-card-thumb thumb-purple">
          <span class="blog-card-cat">Product Updates</span>
          <svg viewBox="0 0 24 24"><path d="M3 3h18v18H3zM9 9h6M9 12h6M9 15h4"/></svg>
        </div>
        <div class="blog-card-body">
          <h3 class="blog-card-title">Why Headless Architecture Matters for Modern Teams</h3>
          <p class="blog-card-desc">Decoupling content from presentation isn't just a buzzword — here's the real-world payoff.</p>
          <div class="post-meta">
            <div class="post-avatar">JS</div>
            <div class="post-meta-text"><strong>Jamal Siddiqui</strong><span class="post-meta-dot">·</span> May 30, 2026</div>
          </div>
        </div>
      </a>

    </div>

    <div class="blog-pagination">
      <a href="#" class="page-btn nav"><svg viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg></a>
      <a href="#" class="page-btn active">1</a>
      <a href="#" class="page-btn">2</a>
      <a href="#" class="page-btn">3</a>
      <a href="#" class="page-btn nav"><svg viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg></a>
    </div>
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