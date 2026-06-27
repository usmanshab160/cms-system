@extends('layouts.app')
@section('content')

<style>
/* ════════════════════════════════════════════════════
   CLEVER CMS — ARTICLE / BLOG SINGLE PAGE
   Fonts: Syne (display) + DM Sans (body)
   Brand: #7c5cfc (purple) · Accent: #f97316 (orange)
   ════════════════════════════════════════════════════ */

@import url('https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap');

:root{
  --brand:#7c5cfc;
  --brand-dark:#6645e0;
  --brand-light:#f1edff;
  --accent:#f97316;
  --accent-light:#fff1e6;
  --ink:#1a1730;
  --ink-soft:#5c5870;
  --line:#e9e6f5;
  --surface:#ffffff;
  --bg:#fbfaff;
  --radius-lg:20px;
  --radius-md:14px;
  --radius-sm:10px;
  --shadow-sm:0 2px 10px rgba(26,23,48,.05);
  --shadow-md:0 10px 30px rgba(124,92,252,.12);
  --font-display:'Syne',sans-serif;
  --font-body:'DM Sans',sans-serif;
}

*{box-sizing:border-box;}
body{
  font-family:var(--font-body);
  color:var(--ink);
  background:var(--bg);
  margin:0;
  -webkit-font-smoothing:antialiased;
}
img{max-width:100%;display:block;}
a{text-decoration:none;color:inherit;}

.cc-container{max-width:1180px;margin:0 auto;padding:0 24px;}
.cc-container-narrow{max-width:880px !important;margin:0 auto !important;padding:0 24px;width:100%;}

/* ─── Reveal animation ─── */
@keyframes fadeUp{from{opacity:0;transform:translateY(16px);}to{opacity:1;transform:translateY(0);}}
.animate-up{animation:fadeUp .7s ease both;}
.delay-1{animation-delay:.08s;}
.delay-2{animation-delay:.16s;}
.delay-3{animation-delay:.24s;}

@media (prefers-reduced-motion: reduce){
  .animate-up{animation:none;}
}

/* ─── Reading progress bar ─── */
.progress-bar{
  position:fixed;top:0;left:0;height:3px;width:0%;
  background:linear-gradient(90deg,var(--brand),var(--accent));
  z-index:999;
  transition:width .1s linear;
}

/* ─── Breadcrumb ─── */
.breadcrumb-bar{
  border-bottom:1px solid var(--line);
  background:var(--surface);
  padding:18px 0;
}
.breadcrumb{
  display:flex;align-items:center;gap:8px;
  font-size:13.5px;font-weight:600;color:var(--ink-soft);
  flex-wrap:wrap;
}
.breadcrumb a{color:var(--ink-soft);transition:color .2s;}
.breadcrumb a:first-child{color:var(--brand);}
.breadcrumb a:hover{color:var(--brand);}
.breadcrumb a:last-of-type{color:var(--ink);}
.breadcrumb-sep{width:14px;height:14px;stroke:#c6c1de;fill:none;stroke-width:2;flex-shrink:0;}

/* ════════════════ ARTICLE HERO ════════════════ */
.article-hero{
  padding:56px 0 40px;
  background:
    radial-gradient(700px 320px at 85% -10%, rgba(124,92,252,.10), transparent 70%),
    radial-gradient(500px 260px at 0% 0%, rgba(249,115,22,.06), transparent 70%);
}
.article-hero-inner{max-width:880px !important;margin:0 auto !important;width:100%;}

.article-meta-row{
  display:flex;align-items:center;gap:12px;margin-bottom:22px;flex-wrap:wrap;
}
.cat-badge{
  display:inline-flex;align-items:center;gap:7px;
  background:var(--brand-light);color:var(--brand-dark);
  font-size:13px;font-weight:700;letter-spacing:.2px;
  padding:7px 14px;border-radius:99px;
}
.reading-time-badge{
  display:inline-flex;align-items:center;gap:6px;
  color:var(--ink-soft);font-size:13px;font-weight:600;
}
.reading-time-badge svg{width:15px;height:15px;stroke:var(--ink-soft);fill:none;stroke-width:2;}

.article-hero-title{
  font-family:var(--font-display);
  font-weight:800;
  font-size:42px;
  line-height:1.18;
  letter-spacing:-.5px;
  margin:0 0 18px;
  color:var(--ink);
}
.article-hero-title .highlight{
  background:linear-gradient(90deg,var(--brand),var(--accent));
  -webkit-background-clip:text;background-clip:text;color:transparent;
}

.article-lead{
  font-size:18px;
  line-height:1.65;
  color:var(--ink-soft);
  margin:0 0 28px;
  font-weight:400;
}

.article-byline{
  display:flex;align-items:center;gap:14px;
  padding:18px 0;
  border-top:1px solid var(--line);
  border-bottom:1px solid var(--line);
  flex-wrap:wrap;
}
.byline-avatar{
  width:46px;height:46px;border-radius:50%;flex-shrink:0;
  background:linear-gradient(135deg,var(--brand),#a98bff);
  color:#fff;font-family:var(--font-display);font-weight:700;font-size:15px;
  display:flex;align-items:center;justify-content:center;
}
.byline-info{margin-right:auto;}
.byline-name{font-weight:700;font-size:15px;color:var(--ink);}
.byline-role{font-size:13px;color:var(--ink-soft);margin-top:2px;}
.byline-stats{
  display:flex;align-items:center;gap:8px;
  font-size:13px;color:var(--ink-soft);font-weight:500;
}
.byline-dot{color:#cfc9e6;}

.share-row{display:flex;align-items:center;gap:8px;}
.share-label{font-size:12.5px;font-weight:700;color:var(--ink-soft);margin-right:4px;text-transform:uppercase;letter-spacing:.5px;}
.share-btn{
  width:34px;height:34px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  background:var(--brand-light);transition:.2s;
}
.share-btn svg{width:15px;height:15px;stroke:var(--brand-dark);fill:none;stroke-width:2;}
.share-btn:hover{background:var(--brand);}
.share-btn:hover svg{stroke:#fff;}

.hero-banner{margin-top:32px;max-width:880px !important;margin-left:auto !important;margin-right:auto !important;width:100%;}
.hero-banner img{
  border-radius:var(--radius-lg);
  box-shadow:var(--shadow-md);
  aspect-ratio:16/9;object-fit:cover;width:100%;
}

/* ════════════════ ARTICLE BODY ════════════════ */
.article-layout{padding:50px 0 30px;}
.article-columns{max-width:880px !important;margin:0 auto !important;width:100%;}
.article-body{width:100%;}

.prose{font-size:17px;line-height:1.85;color:#2b2840;}
.prose h2{
  font-family:var(--font-display);font-weight:700;font-size:28px;
  color:var(--ink);margin:46px 0 18px;letter-spacing:-.2px;
}
.prose h3{
  font-family:var(--font-display);font-weight:700;font-size:22px;
  color:var(--ink);margin:36px 0 14px;
}
.prose p{margin:0 0 22px;}
.prose ul,.prose ol{margin:0 0 22px;padding-left:24px;}
.prose li{margin-bottom:10px;}
.prose li::marker{color:var(--brand);font-weight:700;}
.prose a{color:var(--brand-dark);font-weight:600;border-bottom:1.5px solid var(--brand-light);}
.prose a:hover{border-color:var(--brand-dark);}
.prose strong{color:var(--ink);font-weight:700;}
.prose blockquote{
  margin:30px 0;padding:20px 26px;
  border-left:3px solid var(--accent);
  background:var(--accent-light);
  border-radius:0 var(--radius-sm) var(--radius-sm) 0;
  font-style:italic;color:var(--ink);font-size:17px;
}
.prose img{border-radius:var(--radius-md);margin:28px 0;box-shadow:var(--shadow-sm);}
.prose figcaption{font-size:13.5px;color:var(--ink-soft);text-align:center;margin-top:-18px;margin-bottom:28px;}
.prose pre{
  background:#1a1730;color:#eae7fb;padding:18px 20px;border-radius:var(--radius-sm);
  overflow-x:auto;font-size:14px;margin:26px 0;
}
.prose code{
  background:var(--brand-light);color:var(--brand-dark);
  padding:2px 7px;border-radius:6px;font-size:14.5px;
}
.prose pre code{background:none;color:inherit;padding:0;}
.prose table{width:100%;border-collapse:collapse;margin:26px 0;font-size:15px;}
.prose th,.prose td{padding:10px 14px;border:1px solid var(--line);text-align:left;}
.prose th{background:var(--brand-light);color:var(--brand-dark);font-weight:700;}
.prose hr{border:none;border-top:1px solid var(--line);margin:38px 0;}

/* ─── Article footer ─── */
.article-footer{
  margin-top:48px;padding-top:32px;border-top:1px solid var(--line);
}
.article-tags{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:26px;}
.article-tags-label{font-size:13px;font-weight:700;color:var(--ink-soft);}
.article-tag{
  background:var(--bg);border:1px solid var(--line);
  padding:7px 14px;border-radius:99px;font-size:13.5px;font-weight:600;
  color:var(--ink-soft);transition:.2s;
}
.article-tag:hover{border-color:var(--brand);color:var(--brand-dark);background:var(--brand-light);}

.article-share-footer{
  display:flex;align-items:center;gap:10px;flex-wrap:wrap;
  background:var(--brand-light);border-radius:var(--radius-md);
  padding:18px 22px;
}
.share-footer-label{font-size:14px;font-weight:700;color:var(--ink);margin-right:6px;}
.share-btn-lg{
  display:inline-flex;align-items:center;gap:7px;
  background:#fff;border:1px solid var(--line);
  padding:9px 16px;border-radius:99px;font-size:13.5px;font-weight:700;
  color:var(--ink);transition:.2s;
}
.share-btn-lg svg{width:14px;height:14px;stroke:currentColor;fill:none;stroke-width:2;}
.share-btn-lg:hover{background:var(--brand);color:#fff;border-color:var(--brand);}

/* ════════════════ AUTHOR BIO ════════════════ */
.author-bio-section{padding:10px 0 60px;}
.author-bio-card{
  display:flex;gap:22px;
  background:var(--surface);
  border:1px solid var(--line);
  border-radius:var(--radius-lg);
  padding:32px;
  box-shadow:var(--shadow-sm);
}
.author-bio-avatar{
  width:64px;height:64px;border-radius:50%;flex-shrink:0;
  background:#7C5CFC;
  color:#fff;font-family:var(--font-display);font-weight:700;font-size:19px;
  display:flex;align-items:center;justify-content:center;
}
.author-bio-tag{font-size:12.5px;font-weight:700;text-transform:uppercase;letter-spacing:.6px;color:#6645e0;margin-bottom:4px;}
.author-bio-name{font-family:var(--font-display);font-weight:700;font-size:19px;color:var(--ink);}
.author-bio-role{font-size:13.5px;color:var(--ink-soft);margin-top:2px;margin-bottom:14px;}
.author-bio-desc{font-size:15px;line-height:1.7;color:#3b3752;margin:0 0 18px;}
.author-bio-links{display:flex;gap:18px;flex-wrap:wrap;}
.author-link{
  display:inline-flex;align-items:center;gap:6px;
  font-size:13.5px;font-weight:700;color:var(--brand-dark);
}
.author-link svg{width:15px;height:15px;stroke:var(--brand-dark);fill:none;stroke-width:2;}
.author-link:hover{text-decoration:underline;}

/* ════════════════ MORE ARTICLES ════════════════ */
.more-articles-section{padding:10px 0 80px;}
.more-articles-section .cc-container{
  display:grid;grid-template-columns:repeat(3,1fr);gap:26px;
}
.more-card{
  background:var(--surface);
  border:1px solid var(--line);
  border-radius:var(--radius-lg);
  overflow:hidden;
  transition:transform .25s ease, box-shadow .25s ease;
  display:flex;flex-direction:column;
}
.more-card:hover{transform:translateY(-5px);box-shadow:var(--shadow-md);border-color:transparent;}
.more-card-thumb{
  position:relative;aspect-ratio:16/10;background:var(--brand-light);overflow:hidden;
}
.more-card-thumb img{width:100%;height:100%;object-fit:cover;}
.more-card-cat{
  position:absolute;top:12px;left:12px;z-index:2;
  background:rgba(26,23,48,.72);color:#fff;backdrop-filter:blur(4px);
  font-size:11.5px;font-weight:700;padding:5px 11px;border-radius:99px;
}
.more-card-body{padding:18px 20px 22px;}
.more-card-title{
  font-family:var(--font-display);font-weight:700;font-size:16.5px;
  line-height:1.4;color:var(--ink);margin:0 0 8px;
}
.more-card-desc{font-size:13.5px;line-height:1.6;color:var(--ink-soft);margin:0;}

/* ─── Back to top ─── */
.back-top{
  position:fixed;bottom:28px;right:28px;
  width:48px;height:48px;border-radius:50%;
  background:var(--ink);color:#fff;border:none;cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  opacity:0;transform:translateY(12px);pointer-events:none;
  transition:.25s ease;z-index:90;
  box-shadow:0 8px 24px rgba(26,23,48,.25);
}
.back-top.visible{opacity:1;transform:translateY(0);pointer-events:auto;}
.back-top:hover{background:var(--brand);}
.back-top svg{width:20px;height:20px;stroke:#fff;fill:none;stroke-width:2.4;}

/* ════════════════ RESPONSIVE ════════════════ */
@media (max-width:992px){
  .more-articles-section .cc-container{grid-template-columns:repeat(2,1fr);}
}

@media (max-width:768px){
  .article-hero{padding:36px 0 28px;}
  .article-hero-title{font-size:30px;}
  .article-lead{font-size:16.5px;}
  .article-layout{padding:34px 0 10px;}
  .prose{font-size:16px;}
  .prose h2{font-size:23px;margin:36px 0 14px;}
  .prose h3{font-size:19px;}
  .author-bio-card{flex-direction:column;padding:24px;}
  .more-articles-section .cc-container{grid-template-columns:1fr;}
  .article-byline{gap:12px;}
  .byline-stats{width:100%;order:3;}
  .share-row{margin-left:auto;}
}

@media (max-width:480px){
  .cc-container,.cc-container-narrow{padding:0 18px;}
  .article-hero-title{font-size:25px;}
  .article-meta-row{gap:8px;}
  .article-share-footer{flex-direction:column;align-items:flex-start;}
  .back-top{bottom:18px;right:18px;width:42px;height:42px;}
  .breadcrumb{font-size:12.5px;}
  .author-bio-links{gap:12px;}
}
</style>

<!-- ─── READING PROGRESS ─── -->
<div class="progress-bar" id="progressBar"></div>

<!-- ─── BREADCRUMB ─── -->
<nav class="breadcrumb-bar">
  <div class="cc-container">
    <div class="breadcrumb">
      <a href="#">⚡ clever CMS</a>
      <svg class="breadcrumb-sep" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
      <a href="#">Blog</a>
      <svg class="breadcrumb-sep" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
      <a href="#">{{ $blog->category }}</a>
    </div>
  </div>
</nav>

<!-- ════════════════ ARTICLE HERO ════════════════ -->
<section class="article-hero">
  <div class="cc-container">
    <div class="article-hero-inner">

      <div class="article-meta-row animate-up">
        <span class="cat-badge">
          <svg width="8" height="8" viewBox="0 0 8 8" style="fill:var(--brand)"><circle cx="4" cy="4" r="4"/></svg>
          {{ $blog->category }}
        </span>
        <span class="reading-time-badge">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          {{ $blog->read_time }} min read
        </span>
      </div>

      <h1 class="article-hero-title animate-up delay-1">
        {{ $blog->title }}
      </h1>

      <p class="article-lead animate-up delay-2">
        {{ $blog->description }}
      </p>

      <div class="article-byline animate-up delay-3">
        <div class="byline-avatar">{{ Str::of($blog->author)->explode(' ')->map(fn($w)=>Str::substr($w,0,1))->join('') }}</div>
        <div class="byline-info">
          <div class="byline-name">{{ $blog->author }}</div>
          <div class="byline-role">Head of Product · Clever CMS</div>
        </div>
        <div class="byline-stats">
          <span>{{ $blog->created_at->format('M d, Y') }}</span>
          <span class="byline-dot">·</span>
          <span>{{ $blog->read_time }} min read</span>
          <span class="byline-dot">·</span>
          <span>{{ $blog->views ?? '2.4k' }} views</span>
        </div>
        <div class="share-row">
          <span class="share-label">Share</span>
          <a href="#" class="share-btn" aria-label="Share on X">
            <svg viewBox="0 0 24 24"><path d="M4 4l16 16M20 4L4 20"/></svg>
          </a>
          <a href="#" class="share-btn" aria-label="Share on LinkedIn">
            <svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
          <a href="#" class="share-btn" aria-label="Copy link">
            <svg viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
          </a>
        </div>
      </div>

      @if($blog->featured_image)
      <div class="hero-banner">
        <img src="{{ asset('storage/'.$blog->featured_image) }}" alt="{{ $blog->img_alt }}">
      </div>
      @endif

    </div>
  </div>
</section>

<!-- ════════════════ ARTICLE BODY ════════════════ -->
<section class="article-layout">
  <div class="cc-container">
    <div class="article-columns">

      <article class="article-body">
        <div class="prose">
          {!! $blog->content !!}
        </div>

        <!-- ─── Article Footer ─── -->
        <div class="article-footer">
          <div class="article-tags">
            <span class="article-tags-label">Tagged:</span>
            <a href="#" class="article-tag">Product Updates</a>
            <a href="#" class="article-tag">Collaboration</a>
            <a href="#" class="article-tag">Version 3.0</a>
            <a href="#" class="article-tag">Real-Time Editing</a>
            <a href="#" class="article-tag">Teamwork</a>
          </div>
          <div class="article-share-footer">
            <span class="share-footer-label">Share this article:</span>
            <a href="#" class="share-btn-lg">
              <svg viewBox="0 0 24 24"><path d="M4 4l16 16M20 4L4 20"/></svg>
              Post on X
            </a>
            <a href="#" class="share-btn-lg">
              <svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
              LinkedIn
            </a>
            <a href="#" class="share-btn-lg">
              <svg viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
              Copy Link
            </a>
          </div>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- ════════════════ AUTHOR BIO ════════════════ -->
<section class="author-bio-section">
  <div class="cc-container-narrow">
    <div class="author-bio-card animate-up">
      <div class="author-bio-avatar">{{ Str::of($blog->author)->explode(' ')->map(fn($w)=>Str::substr($w,0,1))->join('') }}</div>
      <div class="author-bio-content">
        <div class="author-bio-tag">Written by</div>
        <div class="author-bio-name">{{ $blog->author }}</div>
        <div class="author-bio-role">Head of Product · Clever CMS</div>
        <p class="author-bio-desc">Ayesha leads product at Clever CMS, where she's been building tools for content teams since 2020. Before joining, she ran product at two B2B SaaS startups and wrote a weekly newsletter on content operations that reached 12,000 subscribers. She believes the best software feels like it was designed by someone who actually does the job.</p>
        <div class="author-bio-links">
          <a href="#" class="author-link">
            <svg viewBox="0 0 24 24"><path d="M4 4l16 16M20 4L4 20"/></svg>
            @{{ Str::slug($blog->author) }}
          </a>
          <a href="#" class="author-link">
            <svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            LinkedIn
          </a>
          <a href="#" class="author-link">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            All posts by {{ Str::of($blog->author)->explode(' ')->first() }}
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════ MORE ARTICLES ════════════════ -->
<section class="more-articles-section">
  <div class="cc-container">
    @foreach($relatedBlogs as $related)
      <a href="{{ route('blog.show',$related->slug) }}" class="more-card">
        <div class="more-card-thumb">
          <span class="more-card-cat">{{ $related->category }}</span>
          @if($related->featured_image)
            <img src="{{ asset('storage/'.$related->featured_image) }}" alt="{{ $related->img_alt }}">
          @endif
        </div>
        <div class="more-card-body">
          <h3 class="more-card-title">{{ $related->title }}</h3>
          <p class="more-card-desc">{{ Str::limit($related->description, 100) }}</p>
        </div>
      </a>
    @endforeach
  </div>
</section>

<!-- ─── Back to Top ─── -->
<button class="back-top" id="backTop" aria-label="Back to top">
  <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"/></svg>
</button>

<script>
  const progressBar = document.getElementById('progressBar');
  const backTop = document.getElementById('backTop');

  window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
    progressBar.style.width = progress + '%';
    if (scrollTop > 400) { backTop.classList.add('visible'); }
    else { backTop.classList.remove('visible'); }
  });

  backTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
</script>

@endsection