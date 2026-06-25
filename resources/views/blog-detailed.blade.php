@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Real-Time Collaboration — Clever CMS Blog</title>


</head>
<body>

<!-- ─── READING PROGRESS ─── -->
<div class="progress-bar" id="progressBar"></div>

<!-- ─── BREADCRUMB ─── -->
<nav class="breadcrumb-bar">
  <div class="container">
    <div class="breadcrumb">
      <a href="#">⚡ clever CMS</a>
      <svg class="breadcrumb-sep" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
      <a href="#">Blog</a>
      <svg class="breadcrumb-sep" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
      <a href="#">Product Updates</a>
      <svg class="breadcrumb-sep" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
      <span class="breadcrumb-current">Version 3.0: Real-Time Collaboration</span>
    </div>
  </div>
</nav>

<!-- ════════════════ ARTICLE HERO ════════════════ -->
<section class="article-hero">
  <div class="container">
    <div class="article-hero-inner">

      <div class="article-meta-row animate-up">
        <span class="cat-badge">
          <svg width="8" height="8" viewBox="0 0 8 8" style="fill:var(--brand)"><circle cx="4" cy="4" r="4"/></svg>
          Product Updates
        </span>
        <span class="reading-time-badge">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          6 min read
        </span>
      </div>

      <h1 class="article-hero-title animate-up delay-1">
        Introducing Version 3.0:<br>
        <span class="highlight">Real-Time Collaboration</span> Is Here
      </h1>

      <p class="article-lead animate-up delay-2">
        Multiple editors, one page, zero conflicts. Here's how our biggest release yet helps teams write, review, and publish together — without stepping on each other's drafts.
      </p>

      <div class="article-byline animate-up delay-3">
        <div class="byline-avatar">AK</div>
        <div class="byline-info">
          <div class="byline-name">Ayesha Khan</div>
          <div class="byline-role">Head of Product · Clever CMS</div>
        </div>
        <div class="byline-stats">
          <span>Jun 22, 2026</span>
          <span class="byline-dot">·</span>
          <span>6 min read</span>
          <span class="byline-dot">·</span>
          <span>2.4k views</span>
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

      <!-- Banner -->
      <div class="hero-banner animate-up delay-4">
        <div class="hero-banner-content">
          <div class="hero-icon-card">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <div class="hero-stats-group">
            <div class="hero-stat-card">
              <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
              <div>
                <div class="hero-stat-label">Concurrent editors supported</div>
                <div class="hero-stat-value">Up to 50 per page</div>
              </div>
            </div>
            <div class="hero-stat-card">
              <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
              <div>
                <div class="hero-stat-label">Average sync latency</div>
                <div class="hero-stat-value">&lt;120ms globally</div>
              </div>
            </div>
            <div class="hero-stat-card">
              <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              <div>
                <div class="hero-stat-label">Conflict resolution</div>
                <div class="hero-stat-value">Automatic, always</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════ ARTICLE BODY ════════════════ -->
<section class="article-layout">
  <div class="container">
    <div class="article-columns">

      <!-- ─── TOC Sidebar ─── -->
      <aside class="toc-sidebar">
        <div class="toc-title">In this article</div>
        <ul class="toc-list">
          <li class="active"><a href="#the-problem">The Problem We Solved</a></li>
          <li><a href="#how-it-works">How It Works</a></li>
          <li class="sub"><a href="#operational-transform">Under the Hood</a></li>
          <li class="sub"><a href="#presence">Live Presence</a></li>
          <li><a href="#whats-new">What's New in 3.0</a></li>
          <li><a href="#getting-started">Getting Started</a></li>
          <li><a href="#pricing">Pricing &amp; Limits</a></li>
          <li><a href="#whats-next">What's Next</a></li>
        </ul>

        <div class="toc-divider"></div>

        <div class="toc-cta">
          <div class="toc-cta-text">Try Version 3.0 free for 14 days — no card required.</div>
          <a href="#" class="toc-cta-btn">Start Free Trial →</a>
        </div>
      </aside>

      <!-- ─── Main Article ─── -->
      <article class="article-body">
        <div class="prose">

          <h2 id="the-problem">The Problem We Solved</h2>

          <p>Anyone who has managed a content team knows the dance: one writer opens a draft, a second editor opens the same draft from a Slack link, and within minutes someone's changes overwrite someone else's. The result is a frantic Slack thread, a backup copy called <strong>final_v3_REAL_THIS_TIME.docx</strong>, and a half-hour of reconciliation before publish.</p>

          <p>We've heard this story from hundreds of teams since Clever CMS launched. It's not a workflow problem — it's an infrastructure problem. Version 3.0 solves it at the root.</p>

          <div class="stat-cards-row">
            <div class="stat-card">
              <div class="stat-card-number">73%</div>
              <div class="stat-card-label">of teams report version conflict as their #1 publishing pain point</div>
            </div>
            <div class="stat-card">
              <div class="stat-card-number">2.4×</div>
              <div class="stat-card-label">faster time-to-publish for teams using real-time collaboration</div>
            </div>
            <div class="stat-card">
              <div class="stat-card-number">0</div>
              <div class="stat-card-label">lost changes in over 6 months of beta testing across 200 teams</div>
            </div>
          </div>

          <div class="callout callout-info">
            <div class="callout-icon">
              <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            </div>
            <div class="callout-content">
              <div class="callout-title">Version 3.0 is rolling out to all plans</div>
              <div class="callout-text">Starter plans get up to 3 concurrent editors per page. Pro and Enterprise plans unlock up to 50. The feature is on by default — no action needed to enable it.</div>
            </div>
          </div>

          <hr class="prose-hr">

          <h2 id="how-it-works">How It Works</h2>

          <p>At its core, Version 3.0 replaces Clever CMS's traditional lock-based document model with a fully distributed editing layer. Rather than granting one editor exclusive write access at a time, every connected editor works on a local replica of the document. Changes are streamed to a coordination layer in real time and merged automatically before being broadcast back to all connected clients.</p>

          <div class="pull-quote">
            <p>"The goal wasn't just to make it technically possible for two people to edit the same page. It was to make it feel like the most natural thing in the world."</p>
            <cite>— Priya Nair, Engineering Lead, Clever CMS</cite>
          </div>

          <h3 id="operational-transform">Under the Hood: Operational Transformation</h3>

          <p>The synchronization engine uses a variant of <strong>Operational Transformation (OT)</strong>, the same fundamental technique behind Google Docs. Every keystroke, block move, or metadata change is represented as a discrete, composable operation. When two operations conflict — say, you deleted a sentence at the same moment a colleague edited the last word of it — the engine applies a deterministic resolution algorithm to produce a result that honors the intent of both changes.</p>

          <div class="code-block">
            <div class="code-header">
              <div class="code-dots">
                <span class="code-dot"></span>
                <span class="code-dot"></span>
                <span class="code-dot"></span>
              </div>
              <span class="code-lang">Webhook · Publish event payload</span>
            </div>
            <pre><span class="cm">// Clever CMS fires this event after each collaborative save</span>
{
  <span class="str">"event"</span>: <span class="str">"page.saved"</span>,
  <span class="str">"page_id"</span>: <span class="str">"pg_01HZ8KRQT"</span>,
  <span class="str">"revision"</span>: <span class="fn">142</span>,
  <span class="str">"editors_active"</span>: [
    { <span class="str">"user_id"</span>: <span class="str">"u_ayesha"</span>, <span class="str">"cursor_block"</span>: <span class="str">"blk_intro"</span> },
    { <span class="str">"user_id"</span>: <span class="str">"u_jamal"</span>,  <span class="str">"cursor_block"</span>: <span class="str">"blk_section2"</span> }
  ],
  <span class="str">"timestamp"</span>: <span class="str">"2026-06-22T09:41:03Z"</span>
}</pre>
          </div>

          <h3 id="presence">Live Presence: Seeing Each Other in the Room</h3>

          <p>Beyond conflict resolution, Version 3.0 introduces <strong>presence indicators</strong> — real-time cursors and selection highlights for every active editor. Each collaborator gets a uniquely colored cursor with their name, visible to everyone else on the page. You can see exactly who's writing what, which eliminates the coordination overhead of Slack threads like "don't touch the intro yet, I'm still editing it."</p>

          <div class="feature-grid">
            <div class="feature-item">
              <div class="feature-item-icon">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              </div>
              <div class="feature-item-title">Named Cursors</div>
              <div class="feature-item-desc">Every editor's cursor appears with their name and a persistent color, so you always know who's where.</div>
            </div>
            <div class="feature-item">
              <div class="feature-item-icon">
                <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              </div>
              <div class="feature-item-title">Selection Highlighting</div>
              <div class="feature-item-desc">Selected text is tinted in the editor's color, preventing you from modifying text a colleague is actively reading or revising.</div>
            </div>
            <div class="feature-item">
              <div class="feature-item-icon">
                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              </div>
              <div class="feature-item-title">Inline Comments</div>
              <div class="feature-item-desc">Leave contextual comments on any block. Mention teammates with @ — they get a real-time notification even if they're not currently in the document.</div>
            </div>
            <div class="feature-item">
              <div class="feature-item-icon">
                <svg viewBox="0 0 24 24"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>
              </div>
              <div class="feature-item-title">Version History</div>
              <div class="feature-item-desc">Every collaborative session is snapshotted. Browse, compare, and restore any previous state with one click — perfect for post-publish audits.</div>
            </div>
          </div>

          <hr class="prose-hr">

          <h2 id="whats-new">What's New in 3.0 vs 2.x</h2>

          <p>Here's a full feature comparison between the previous version and Version 3.0, so you know exactly what's changed and what to expect when you update:</p>

          <table class="comparison-table">
            <thead>
              <tr>
                <th>Capability</th>
                <th>Version 2.x</th>
                <th>Version 3.0</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="col-feature">Concurrent editors</td>
                <td class="col-v2"><span class="cross">✗</span> Single lock</td>
                <td class="col-v3"><span class="check">✓</span> Up to 50</td>
              </tr>
              <tr>
                <td class="col-feature">Live presence cursors</td>
                <td class="col-v2"><span class="cross">✗</span> Not available</td>
                <td class="col-v3"><span class="check">✓</span> Named &amp; colored</td>
              </tr>
              <tr>
                <td class="col-feature">Conflict resolution</td>
                <td class="col-v2">Manual merge required</td>
                <td class="col-v3"><span class="check">✓</span> Automatic (OT)</td>
              </tr>
              <tr>
                <td class="col-feature">Inline comments</td>
                <td class="col-v2">Block-level only</td>
                <td class="col-v3">Inline + threaded</td>
              </tr>
              <tr>
                <td class="col-feature">Version history</td>
                <td class="col-v2">Daily snapshots</td>
                <td class="col-v3">Per-session snapshots</td>
              </tr>
              <tr>
                <td class="col-feature">Webhook on save</td>
                <td class="col-v2">On publish only</td>
                <td class="col-v3">Every collaborative save</td>
              </tr>
              <tr>
                <td class="col-feature">Offline editing</td>
                <td class="col-v2"><span class="cross">✗</span> Not supported</td>
                <td class="col-v3"><span class="check">✓</span> Queue &amp; sync on reconnect</td>
              </tr>
            </tbody>
          </table>

          <div class="callout callout-tip">
            <div class="callout-icon">
              <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <div class="callout-content">
              <div class="callout-title">Already on a paid plan?</div>
              <div class="callout-text">You're upgraded automatically. Head to <strong>Settings → Collaboration</strong> to configure concurrent editor limits, notification preferences, and session timeout durations for your workspace.</div>
            </div>
          </div>

          <hr class="prose-hr">

          <h2 id="getting-started">Getting Started in 5 Steps</h2>

          <p>You don't need to change anything about how you use Clever CMS to get started. Collaboration is live for every page, every workspace, right now. Here's how to make the most of it from day one:</p>

          <ol class="steps-list">
            <li class="step-item">
              <div class="step-num">1</div>
              <div class="step-content">
                <div class="step-title">Open any page in the editor</div>
                <div class="step-desc">Navigate to the page you want to edit. You'll see a new collaborators panel in the top-right of the editor toolbar showing who else is currently viewing the page.</div>
              </div>
            </li>
            <li class="step-item">
              <div class="step-num">2</div>
              <div class="step-content">
                <div class="step-title">Share the editor link with your team</div>
                <div class="step-desc">Click the <strong>Share</strong> button in the top bar. Anyone with editor permissions in your workspace can join via the link — no invite flow needed.</div>
              </div>
            </li>
            <li class="step-item">
              <div class="step-num">3</div>
              <div class="step-content">
                <div class="step-title">Watch cursors appear in real time</div>
                <div class="step-desc">As teammates join, you'll see their named cursors appear and move around the document. Each person's edits are highlighted in their color as they type.</div>
              </div>
            </li>
            <li class="step-item">
              <div class="step-num">4</div>
              <div class="step-content">
                <div class="step-title">Use inline comments for review</div>
                <div class="step-desc">Highlight any text and click the comment bubble that appears. Type your note and <strong>@mention</strong> a colleague — they'll get a notification even if they're offline.</div>
              </div>
            </li>
            <li class="step-item">
              <div class="step-num">5</div>
              <div class="step-content">
                <div class="step-title">Publish when the team is ready</div>
                <div class="step-desc">Any editor with publish rights can hit the Publish button. A snapshot of the final collaborative session is saved automatically to version history before going live.</div>
              </div>
            </li>
          </ol>

          <div class="callout callout-warn">
            <div class="callout-icon">
              <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
            <div class="callout-content">
              <div class="callout-title">Heads up: legacy page-lock behavior is removed</div>
              <div class="callout-text">If your team relied on the old "lock page for editing" button to signal work-in-progress, that button is gone in 3.0. Presence indicators replace it — use a colleague's cursor as the signal that a block is actively being edited.</div>
            </div>
          </div>

          <hr class="prose-hr">

          <h2 id="pricing">Pricing &amp; Editor Limits</h2>

          <p>Real-time collaboration is available on all Clever CMS plans with no additional cost. The number of concurrent editors per page scales with your plan tier:</p>

          <ul>
            <li><strong>Starter</strong> — Up to 3 simultaneous editors per page. Perfect for small content teams and solo founders with occasional contributors.</li>
            <li><strong>Pro</strong> — Up to 15 simultaneous editors. Includes full version history, threaded comments, and priority support.</li>
            <li><strong>Enterprise</strong> — Up to 50 editors with dedicated infrastructure, SSO, custom retention policies, and a 99.9% uptime SLA for the collaboration layer.</li>
          </ul>

          <p>If your team has edge cases — an editorial sprint where 80 writers need to work simultaneously on different sections — <a href="#">contact our team</a>. We've already handled this for a few large newsrooms and can scale to fit.</p>

          <hr class="prose-hr">

          <h2 id="whats-next">What's Next</h2>

          <p>Version 3.0 is the foundation, not the ceiling. The collaboration layer we've built unlocks a roadmap of features that weren't possible before. Here's what we're working on for the next two quarters:</p>

          <ul>
            <li><strong>Suggested Edits mode</strong> — Like Google Docs' "Suggesting" mode, reviewers will be able to propose changes that require an author to accept or reject before publishing.</li>
            <li><strong>AI co-editor</strong> — Invite Claude directly into a collaborative session to help rewrite, expand, or summarize sections without leaving the editor.</li>
            <li><strong>Mobile collaboration</strong> — Full collaborative editing in the Clever CMS iOS and Android apps, including presence indicators optimized for small screens.</li>
            <li><strong>Zapier and Make integration</strong> — Trigger automations on collaborative session events — a session ending, a comment being resolved, or a page reaching its first approval.</li>
          </ul>

          <p>The best way to stay up to date is to subscribe to our weekly newsletter below. We ship fast, and we announce everything there first.</p>

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
  <div class="container-narrow">
    <div class="author-bio-card animate-up">
      <div class="author-bio-avatar">AK</div>
      <div class="author-bio-content">
        <div class="author-bio-tag">Written by</div>
        <div class="author-bio-name">Ayesha Khan</div>
        <div class="author-bio-role">Head of Product · Clever CMS · she/her</div>
        <p class="author-bio-desc">Ayesha leads product at Clever CMS, where she's been building tools for content teams since 2020. Before joining, she ran product at two B2B SaaS startups and wrote a weekly newsletter on content operations that reached 12,000 subscribers. She believes the best software feels like it was designed by someone who actually does the job.</p>
        <div class="author-bio-links">
          <a href="#" class="author-link">
            <svg viewBox="0 0 24 24"><path d="M4 4l16 16M20 4L4 20"/></svg>
            @ayeshakhan
          </a>
          <a href="#" class="author-link">
            <svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            LinkedIn
          </a>
          <a href="#" class="author-link">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            All posts by Ayesha
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════ MORE ARTICLES ════════════════ -->
<section class="more-articles-section">
  <div class="container">
    <div class="section-header">
      <span class="tag">
        <svg width="8" height="8" viewBox="0 0 8 8" style="fill:var(--brand)"><circle cx="4" cy="4" r="4"/></svg>
        Keep Reading
      </span>
      <h2 class="section-title">More From the Blog</h2>
      <p class="section-sub">Guides, updates, and deep-dives from the Clever CMS team.</p>
    </div>

    <div class="more-grid">

      <a href="#" class="more-card">
        <div class="more-card-thumb thumb-green">
          <span class="more-card-cat">Tutorials</span>
          <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        </div>
        <div class="more-card-body">
          <h3 class="more-card-title">10 Drag-and-Drop Tricks Every New Editor Should Know</h3>
          <p class="more-card-desc">Speed up your workflow with shortcuts and layout tricks most editors don't discover for months.</p>
          <div class="post-meta">
            <div class="post-avatar">MR</div>
            <div class="post-meta-text"><strong>Maya Reyes</strong><span class="post-meta-dot">·</span> Jun 18, 2026</div>
          </div>
        </div>
      </a>

      <a href="#" class="more-card">
        <div class="more-card-thumb thumb-orange">
          <span class="more-card-cat">SEO</span>
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
        <div class="more-card-body">
          <h3 class="more-card-title">How to Structure Meta Tags for Better Search Rankings</h3>
          <p class="more-card-desc">A practical checklist for titles, descriptions, and Open Graph tags that search engines actually reward.</p>
          <div class="post-meta">
            <div class="post-avatar">JS</div>
            <div class="post-meta-text"><strong>Jamal Siddiqui</strong><span class="post-meta-dot">·</span> Jun 15, 2026</div>
          </div>
        </div>
      </a>

      <a href="#" class="more-card">
        <div class="more-card-thumb thumb-dark">
          <span class="more-card-cat">Company News</span>
          <svg viewBox="0 0 24 24"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
        </div>
        <div class="more-card-body">
          <h3 class="more-card-title">Clever CMS Raises $12M Series A to Expand Globally</h3>
          <p class="more-card-desc">The new funding will go toward localization, enterprise features, and a faster publishing pipeline.</p>
          <div class="post-meta">
            <div class="post-avatar">AK</div>
            <div class="post-meta-text"><strong>Ayesha Khan</strong><span class="post-meta-dot">·</span> Jun 08, 2026</div>
          </div>
        </div>
      </a>

    </div>

    <div class="btn-row">
      <a href="#" class="btn-outline">
        Browse All Articles
        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ════════════════ NEWSLETTER ════════════════ -->
<section class="newsletter-section">
  <div class="container">
    <div class="newsletter-inner">
      <div class="newsletter-tag">
        <svg width="8" height="8" viewBox="0 0 8 8" style="fill:#fff"><circle cx="4" cy="4" r="4"/></svg>
        Stay in the Loop
      </div>
      <h2 class="newsletter-title">Get Our Best Posts<br/>Straight to Your Inbox</h2>
      <p class="newsletter-sub">One email a week. No spam, no fluff — just the guides and updates worth reading.</p>
      <form class="newsletter-form" onsubmit="return false;">
        <input type="email" placeholder="you@company.com" required>
        <button type="submit" class="btn-newsletter">Subscribe</button>
      </form>
      <p class="newsletter-note">Join 4,200+ teams already subscribed · Unsubscribe anytime</p>
    </div>
  </div>
</section>

<!-- ─── Back to Top ─── -->
<button class="back-top" id="backTop" aria-label="Back to top">
  <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"/></svg>
</button>

<script>
  /* ─── Reading Progress ─── */
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

  /* ─── TOC Active State ─── */
  const sections = document.querySelectorAll('.prose h2[id], .prose h3[id]');
  const tocLinks = document.querySelectorAll('.toc-list li');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        tocLinks.forEach(li => li.classList.remove('active'));
        const id = entry.target.getAttribute('id');
        const active = document.querySelector(`.toc-list li a[href="#${id}"]`);
        if (active) active.parentElement.classList.add('active');
      }
    });
  }, { rootMargin: '-20% 0px -70% 0px' });

  sections.forEach(s => observer.observe(s));

  /* ─── Filter pills (demo) ─── */
  document.querySelectorAll('.filter-pill').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.filter-pill').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });
</script>
</body>
</html>
@endsection