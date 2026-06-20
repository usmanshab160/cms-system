@extends('layouts.app')

@section('content')


 

 
 
<!-- ════════════════ HERO ════════════════ -->
<section class="hero" id="home">
  <div class="container">
    <div class="hero-inner">
 
      <!-- Left: Copy -->
      <div class="hero-copy">
        <div class="hero-badge animate-up">
          <span class="tag">
            <svg width="10" height="10" viewBox="0 0 10 10" style="fill:var(--brand)"><circle cx="5" cy="5" r="5"/></svg>
            #1 Content Management Platform
          </span>
        </div>
 
        <h1 class="hero-title animate-up delay-1">
          Manage Your<br/>
          Content with<br/>
          <span class="highlight">Pure Clarity</span>
        </h1>
 
        <p class="hero-sub animate-up delay-2">
          Clever CMS gives your team the power to create, organize, and publish content at lightning speed — no code required. Built for modern teams.
        </p>
 
        <div class="hero-actions animate-up delay-3">
          <a href="#" class="btn-hero-primary">
            Get Started Free
            <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
          <a href="#" class="btn-hero-ghost">
            <span class="play-dot">
              <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
            </span>
            Watch Demo
          </a>
        </div>
 
        <div class="hero-trust animate-up delay-4">
          <div class="trust-avatars">
            <span>AK</span><span>MR</span><span>JS</span><span>LP</span>
          </div>
          <div class="trust-text">
            <strong>4,200+ teams</strong> already using Clever CMS<br/>
            ⭐ 4.9/5 from 800+ reviews
          </div>
        </div>
      </div>
 
      <!-- Right: Dashboard preview -->
      <div class="hero-visual animate-up delay-2">
        <!-- Floating cards -->
        <div class="float-card float-card-1">
          <div class="fc-icon"><svg viewBox="0 0 24 24"><path d="M3 3h18v18H3zM9 9h6M9 12h6M9 15h4"/></svg></div>
          <div>
            <div class="fc-label">Content Published</div>
            <div class="fc-val">+24 this week</div>
          </div>
        </div>
        <div class="float-card float-card-2">
          <div style="display:flex;align-items:center;gap:8px;">
            <div class="fc-dot"></div>
            <span style="font-weight:600;color:var(--text-dark);font-size:0.75rem;">System Live</span>
          </div>
          <div style="font-size:0.68rem;color:var(--text-muted);margin-top:2px;">99.9% uptime · 3ms latency</div>
        </div>
 
        <!-- Dashboard mockup -->
        <div class="dashboard-card">
          <div class="dash-header">
            <span class="dash-title">Content Overview</span>
            <span class="dash-badge">● Live</span>
          </div>
 
          <div class="dash-stats">
            <div class="dash-stat">
              <div class="dash-stat-val">142</div>
              <div class="dash-stat-lbl">Pages</div>
            </div>
            <div class="dash-stat">
              <div class="dash-stat-val">38</div>
              <div class="dash-stat-lbl">Drafts</div>
            </div>
            <div class="dash-stat">
              <div class="dash-stat-val">7</div>
              <div class="dash-stat-lbl">Users</div>
            </div>
          </div>
 
          <div class="dash-bar-row">
            <div class="dash-bar-item">
              <span class="dash-bar-label">Blog Posts</span>
              <div class="dash-bar-track"><div class="dash-bar-fill" style="width:78%"></div></div>
              <span class="dash-bar-pct">78%</span>
            </div>
            <div class="dash-bar-item">
              <span class="dash-bar-label">Landing Pages</span>
              <div class="dash-bar-track"><div class="dash-bar-fill" style="width:55%;background:#a78bfa"></div></div>
              <span class="dash-bar-pct">55%</span>
            </div>
            <div class="dash-bar-item">
              <span class="dash-bar-label">Media</span>
              <div class="dash-bar-track"><div class="dash-bar-fill" style="width:40%;background:#f97316"></div></div>
              <span class="dash-bar-pct">40%</span>
            </div>
          </div>
 
          <div class="dash-content-list">
            <div class="dash-content-item">
              <div class="dash-icon"><svg viewBox="0 0 24 24" style="width:13px;height:13px;fill:var(--brand)"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14,2 14,8 20,8"/></svg></div>
              <span class="dash-item-title">Getting Started Guide</span>
              <span class="dash-item-status status-live">Live</span>
            </div>
            <div class="dash-content-item">
              <div class="dash-icon"><svg viewBox="0 0 24 24" style="width:13px;height:13px;fill:var(--brand)"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg></div>
              <span class="dash-item-title">Q4 Campaign Page</span>
              <span class="dash-item-status status-draft">Draft</span>
            </div>
            <div class="dash-content-item">
              <div class="dash-icon"><svg viewBox="0 0 24 24" style="width:13px;height:13px;fill:var(--brand)"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div>
              <span class="dash-item-title">SEO Audit Report</span>
              <span class="dash-item-status status-live">Live</span>
            </div>
          </div>
        </div>
      </div>
 
    </div>
  </div>
</section>
 
 
<!-- ════════════════ FEATURES ════════════════ -->
<section class="features" id="features">
  <div class="container">
    <div class="section-header">
      <span class="tag">Features</span>
      <h2 class="section-title">Everything Your Team Needs</h2>
      <p class="section-sub">From content creation to publishing, Clever CMS covers every step of your workflow with smart, intuitive tools.</p>
    </div>
 
    <div class="features-grid">
 
      <div class="feature-card">
        <div class="feat-icon-wrap">
          <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        </div>
        <div class="feat-title">Easy Content Editing</div>
        <div class="feat-desc">Drag-and-drop block editor with real-time preview. Write, format, and publish content without touching a single line of code.</div>
      </div>
 
      <div class="feature-card accent-card">
        <div class="feat-icon-wrap">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        </div>
        <div class="feat-title">Smart Media Manager</div>
        <div class="feat-desc">Upload, organize, and optimize images, videos, and documents in one central library. Auto-resize and CDN delivery included.</div>
      </div>
 
      <div class="feature-card">
        <div class="feat-icon-wrap">
          <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <div class="feat-title">Role-Based Access</div>
        <div class="feat-desc">Assign Editor, Author, or Admin roles. Control exactly who can create, edit, or publish with granular permissions.</div>
      </div>
 
      <div class="feature-card">
        <div class="feat-icon-wrap">
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
        <div class="feat-title">Built-in SEO Tools</div>
        <div class="feat-desc">Meta titles, descriptions, Open Graph tags, and sitemap generation — all managed from a single intuitive panel.</div>
      </div>
 
      <div class="feature-card">
        <div class="feat-icon-wrap">
          <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <div class="feat-title">Real-Time Analytics</div>
        <div class="feat-desc">Track page views, engagement, and conversion rates. Make data-driven content decisions with live dashboards.</div>
      </div>
 
      <div class="feature-card">
        <div class="feat-icon-wrap">
          <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        </div>
        <div class="feat-title">API & Integrations</div>
        <div class="feat-desc">Connect with Slack, Stripe, HubSpot, and 100+ tools. Headless CMS API for custom front-end frameworks.</div>
      </div>
 
    </div>
  </div>
</section>
 
 
<!-- ════════════════ HOW IT WORKS ════════════════ -->
<section class="how-it-works" id="how">
  <div class="container">
    <div class="section-header">
      <span class="tag">How It Works</span>
      <h2 class="section-title">Up & Running in Minutes</h2>
      <p class="section-sub">Three simple steps to get your content live. No technical setup, no complicated onboarding.</p>
    </div>
 
    <div class="steps-wrapper">
 
      <div class="step-card">
        <div class="step-num">01</div>
        <div class="step-icon-wrap">
          <svg viewBox="0 0 24 24" style="width:26px;height:26px;fill:var(--brand)"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <div class="step-title">Create Your Account</div>
        <div class="step-desc">Sign up in 30 seconds. No credit card required. Pick a workspace name and invite your team members right away.</div>
        <div class="step-arrow">
          <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </div>
      </div>
 
      <div class="step-card active">
        <div class="step-num">02</div>
        <div class="step-icon-wrap">
          <svg viewBox="0 0 24 24" style="width:26px;height:26px;fill:var(--brand)"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        </div>
        <div class="step-title">Build Your Content</div>
        <div class="step-desc">Use the drag-and-drop editor to create pages, blogs, and landing pages. Add media, SEO metadata, and custom fields with ease.</div>
        <div class="step-arrow">
          <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </div>
      </div>
 
      <div class="step-card">
        <div class="step-num">03</div>
        <div class="step-icon-wrap">
          <svg viewBox="0 0 24 24" style="width:26px;height:26px;fill:var(--brand)"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
        </div>
        <div class="step-title">Publish & Go Live</div>
        <div class="step-desc">Hit publish and your content goes live instantly on your domain. Schedule posts, manage versions, and track performance.</div>
      </div>
 
    </div>
  </div>
</section>
 
 
<!-- ════════════════ CTA SECTION ════════════════ -->
<section class="cta-section" id="cta">
  <div class="container">
    <div class="cta-inner">
      <div class="cta-tag">
        <svg width="8" height="8" viewBox="0 0 8 8" style="fill:#fff"><circle cx="4" cy="4" r="4"/></svg>
        Start for Free Today
      </div>
      <h2 class="cta-title">Ready to Manage Your<br/>Content Smarter?</h2>
      <p class="cta-sub">Join thousands of teams who've simplified their content workflow with Clever CMS. No setup fees, no contracts.</p>
 
      <div class="cta-actions">
        <a href="#" class="btn-cta-white">
          <svg viewBox="0 0 24 24"><path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/></svg>
          Get Started Free
        </a>
        <a href="#" class="btn-cta-outline">
          Schedule a Demo →
        </a>
      </div>
 
      <p class="cta-trial-note">
        <strong>14-day free trial</strong> · No credit card required · Cancel anytime
      </p>
    </div>
  </div>
</section>
 
 
<!-- ════════════════ FOOTER ════════════════ -->
<footer>
  <div class="container">
    <div class="footer-inner">
      <span class="footer-logo-text">⚡ clever CMS</span>
      <span class="footer-copy">© 2025 Clever CMS. All rights reserved.</span>
    </div>
  </div>
</footer>



@endsection