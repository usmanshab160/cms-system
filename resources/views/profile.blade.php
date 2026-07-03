@extends('layouts.app')
@section('content')

<style>
  /* ─── PROFILE PAGE (uses existing design tokens from :root) ─── */

  .profile-page {
    background: var(--bg);
    min-height: 100vh;
    padding: 60px 0 90px;
    position: relative;
    overflow: hidden;
  }
  .profile-page::before {
    content: '';
    position: absolute; top: -120px; right: -160px;
    width: 600px; height: 600px; border-radius: 50%;
    background: radial-gradient(circle, rgba(124,92,252,0.10) 0%, transparent 70%);
    pointer-events: none;
  }
  .profile-page::after {
    content: '';
    position: absolute; bottom: -100px; left: -120px;
    width: 420px; height: 420px; border-radius: 50%;
    background: radial-gradient(circle, rgba(249,115,22,0.07) 0%, transparent 70%);
    pointer-events: none;
  }

  .profile-page .cc-container {
    max-width: 1080px; margin: 0 auto; padding: 0 28px;
    position: relative; z-index: 1;
  }

  /* Page heading */
  .profile-page-header { margin-bottom: 32px; }
  .profile-page-title {
    font-family: var(--font-head);
    font-size: clamp(1.7rem, 3vw, 2.3rem);
    font-weight: 800; letter-spacing: -1px;
    color: var(--text-dark);
  }
  .profile-page-sub {
    font-size: 0.95rem; color: var(--text-muted); margin-top: 6px;
  }

  /* ─── HERO / IDENTITY CARD ─── */
  .profile-hero-card {
    background: var(--bg-white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-xl);
    border: 1px solid rgba(124,92,252,0.1);
    padding: 36px;
    display: flex; align-items: center; gap: 28px;
    flex-wrap: wrap;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
  }
  .profile-hero-card::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 86px;
    background: linear-gradient(135deg, #7c5cfc 0%, #5b3fe8 60%, #4730d6 100%);
    z-index: 0;
  }

  .profile-photo-wrap { position: relative; z-index: 1; flex-shrink: 0; }
  .profile-photo {
    width: 108px; height: 108px; border-radius: 50%;
    background: linear-gradient(145deg, #a78bfa, #7c5cfc);
    border: 5px solid var(--bg-white);
    box-shadow: 0 8px 24px rgba(124,92,252,0.35);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-head); font-size: 2.4rem; font-weight: 800;
    color: #fff; text-transform: uppercase;
    overflow: hidden;
  }
  .profile-photo img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }

  .profile-photo-edit {
    position: absolute; bottom: 2px; right: 2px;
    width: 32px; height: 32px; border-radius: 50%;
    background: var(--accent);
    border: 3px solid var(--bg-white);
    display: flex; align-items: center; justify-content: center;
    cursor: pointer;
    box-shadow: 0 3px 10px rgba(249,115,22,0.4);
    transition: transform 0.15s, background 0.15s;
  }
  .profile-photo-edit:hover { transform: scale(1.08); background: #ea580c; }
  .profile-photo-edit svg { width: 14px; height: 14px; fill: #fff; }

  .profile-hero-info { position: relative; z-index: 1; flex: 1; min-width: 200px; }
  .profile-hero-name {
    font-family: var(--font-head); font-size: 1.5rem; font-weight: 800;
    color: var(--text-dark); letter-spacing: -0.5px; margin-bottom: 4px;
  }
  .profile-hero-email {
    font-size: 0.92rem; color: var(--text-muted); margin-bottom: 10px;
  }
  .profile-role-tag {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--brand-light); color: var(--brand-dark);
    font-family: var(--font-body); font-size: 0.76rem; font-weight: 600;
    letter-spacing: 0.5px; text-transform: uppercase;
    padding: 5px 14px; border-radius: 99px;
    border: 1px solid rgba(124,92,252,0.2);
  }
  .profile-role-tag svg { width: 12px; height: 12px; fill: var(--brand-dark); }

  .profile-hero-actions { position: relative; z-index: 1; flex-shrink: 0; }
  .btn-edit-profile {
    display: inline-flex; align-items: center; gap: 8px;
    font-family: var(--font-body); font-size: 0.92rem; font-weight: 600;
    color: #fff; background: var(--brand); border: none; cursor: pointer;
    padding: 11px 24px; border-radius: 10px;
    box-shadow: 0 3px 10px rgba(124,92,252,0.35);
    transition: background 0.18s, box-shadow 0.18s, transform 0.12s;
    text-decoration: none;
  }
  .btn-edit-profile:hover {
    background: var(--brand-dark);
    box-shadow: 0 6px 18px rgba(124,92,252,0.4);
    transform: translateY(-1px);
  }
  .btn-edit-profile svg { width: 15px; height: 15px; fill: #fff; }

  /* ─── STATS GRID ─── */
  .profile-stats-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 20px; margin-bottom: 28px;
  }
  .profile-stat-card {
    background: var(--bg-white);
    border-radius: var(--radius-lg);
    padding: 24px;
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
  }
  .profile-stat-card:hover {
    border-color: rgba(124,92,252,0.2);
    box-shadow: 0 8px 28px rgba(124,92,252,0.1);
    transform: translateY(-3px);
  }
  .profile-stat-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
  .profile-stat-icon {
    width: 44px; height: 44px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
  }
  .profile-stat-icon svg { width: 20px; height: 20px; }
  .profile-stat-card.total .profile-stat-icon { background: var(--brand-light); }
  .profile-stat-card.total .profile-stat-icon svg { fill: var(--brand); }
  .profile-stat-card.published .profile-stat-icon { background: #ecfdf5; }
  .profile-stat-card.published .profile-stat-icon svg { fill: #059669; }
  .profile-stat-card.draft .profile-stat-icon { background: var(--accent-light); }
  .profile-stat-card.draft .profile-stat-icon svg { fill: var(--accent); }

  .profile-stat-val { font-family: var(--font-head); font-size: 2rem; font-weight: 800; color: var(--text-dark); line-height: 1; }
  .profile-stat-lbl { font-size: 0.85rem; color: var(--text-muted); margin-top: 6px; font-weight: 500; }

  .profile-stat-badge {
    font-size: 0.7rem; font-weight: 600; padding: 3px 9px; border-radius: 99px;
  }
  .profile-stat-card.published .profile-stat-badge { background: #ecfdf5; color: #059669; }
  .profile-stat-card.draft .profile-stat-badge { background: var(--accent-light); color: var(--accent); }

  /* ─── DETAILS CARD ─── */
  .profile-details-card {
    background: var(--bg-white);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    padding: 32px;
  }
  .profile-details-title {
    font-family: var(--font-head); font-size: 1.1rem; font-weight: 700;
    color: var(--text-dark); margin-bottom: 22px;
    display: flex; align-items: center; gap: 8px;
  }
  .profile-details-title svg { width: 18px; height: 18px; fill: var(--brand); }

  .profile-details-grid {
    display: grid; grid-template-columns: repeat(2, 1fr);
    gap: 22px 28px;
  }
  .profile-detail-item {
    display: flex; align-items: flex-start; gap: 14px;
    padding: 14px 16px;
    background: var(--bg);
    border-radius: var(--radius);
    border: 1px solid transparent;
    transition: border-color 0.18s;
  }
  .profile-detail-item:hover { border-color: rgba(124,92,252,0.15); }

  .profile-detail-icon {
    width: 38px; height: 38px; border-radius: 10px; flex-shrink: 0;
    background: var(--brand-light);
    display: flex; align-items: center; justify-content: center;
  }
  .profile-detail-icon svg { width: 17px; height: 17px; fill: var(--brand); }

  .profile-detail-text { min-width: 0; }
  .profile-detail-label {
    font-size: 0.74rem; color: var(--text-muted); font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.4px; margin-bottom: 3px;
  }
  .profile-detail-value {
    font-size: 0.95rem; color: var(--text-dark); font-weight: 600;
    word-break: break-word;
  }

  /* ─── RESPONSIVE ─── */
  @media (max-width: 900px) {
    .profile-stats-grid { grid-template-columns: repeat(3, 1fr); gap: 14px; }
    .profile-stat-card { padding: 18px; }
  }

  @media (max-width: 768px) {
    .profile-hero-card { padding: 28px 22px; text-align: center; justify-content: center; }
    .profile-hero-info { text-align: center; }
    .profile-hero-actions { width: 100%; }
    .btn-edit-profile { width: 100%; justify-content: center; }
    .profile-details-grid { grid-template-columns: 1fr; }
  }

  @media (max-width: 600px) {
    .profile-page { padding: 40px 0 60px; }
    .profile-page .cc-container { padding: 0 18px; }
    .profile-stats-grid { grid-template-columns: 1fr; gap: 14px; }
    .profile-hero-card { flex-direction: column; gap: 18px; }
    .profile-photo { width: 92px; height: 92px; font-size: 2rem; }
    .profile-details-card { padding: 22px 18px; }
    .profile-stat-val { font-size: 1.7rem; }
  }
</style>

<div class="profile-page">
  <div class="cc-container">

    <div class="profile-page-header animate-up">
      <h1 class="profile-page-title">My Profile</h1>
      <p class="profile-page-sub">Manage your account information and view your activity</p>
    </div>

    {{-- ═══════════ IDENTITY / PHOTO CARD ═══════════ --}}
    <div class="profile-hero-card animate-up delay-1">
      <div class="profile-photo-wrap">
        <div class="profile-photo">
          @if(auth()->user()->profile_photo ?? false)
            <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="{{ auth()->user()->name }}">
          @else
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
          @endif
        </div>
        <div class="profile-photo-edit" title="Change photo">
          <svg viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 000-1.41l-2.34-2.34a1 1 0 00-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
        </div>
      </div>

      <div class="profile-hero-info">
        <div class="profile-hero-name">{{ auth()->user()->name }}</div>
        {{-- <div class="profile-hero-email">{{ auth()->user()->email }}</div> --}}
        <span class="profile-role-tag">
          <svg viewBox="0 0 24 24"><path d="M12 12c2.7 0 8 1.34 8 4v2H4v-2c0-2.66 5.3-4 8-4zm0-2a4 4 0 100-8 4 4 0 000 8z"/></svg>
          {{ auth()->user()->role ?? 'Member' }}
        </span>
      </div>

      <div class="profile-hero-actions">
        <a href="{{ url('http://127.0.0.1:8000/edit-profile') }}" class="btn-edit-profile">
          <svg viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 000-1.41l-2.34-2.34a1 1 0 00-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
          Edit Profile
        </a>
      </div>
    </div>

    {{-- ═══════════ STATS ═══════════ --}}
    <div class="profile-stats-grid animate-up delay-2">

      <div class="profile-stat-card total">
        <div class="profile-stat-top">
          <div class="profile-stat-icon">
            <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6zm-1 7V3.5L18.5 9H13z"/></svg>
          </div>
        </div>
        <div class="profile-stat-val">{{ $user->blogs_count }}</div>
        <div class="profile-stat-lbl">Total Articles</div>
      </div>

      <div class="profile-stat-card published">
        <div class="profile-stat-top">
          <div class="profile-stat-icon">
            <svg viewBox="0 0 24 24"><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/></svg>
          </div>
          <span class="profile-stat-badge">Live</span>
        </div>
        <div class="profile-stat-val">{{ $user->published_count }}</div>
        <div class="profile-stat-lbl">Published Articles</div>
      </div>

      <div class="profile-stat-card draft">
        <div class="profile-stat-top">
          <div class="profile-stat-icon">
            <svg viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25z"/></svg>
          </div>
          <span class="profile-stat-badge">Draft</span>
        </div>
        <div class="profile-stat-val">{{ $user->draft_count }}</div>
        <div class="profile-stat-lbl">Draft Articles</div>
      </div>

      <div class="profile-stat-card scheduled">
        <div class="profile-stat-top">
          <div class="profile-stat-icon">
            <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm1 11h4v2h-6V6h2v6z"/></svg>
          </div>
          <span class="profile-stat-badge">Scheduled</span>
        </div>
        <div class="profile-stat-val">{{ $user->scheduled_count }}</div>
        <div class="profile-stat-lbl">Scheduled Articles</div>
      </div>
    </div>

    {{-- ═══════════ DETAILS ═══════════ --}}
    <div class="profile-details-card animate-up delay-3">
      <div class="profile-details-title">
        <svg viewBox="0 0 24 24"><path d="M12 12c2.7 0 8 1.34 8 4v2H4v-2c0-2.66 5.3-4 8-4zm0-2a4 4 0 100-8 4 4 0 000 8z"/></svg>
        Account Details
      </div>

      <div class="profile-details-grid">

        <div class="profile-detail-item">
          <div class="profile-detail-icon">
            <svg viewBox="0 0 24 24"><path d="M12 12c2.7 0 8 1.34 8 4v2H4v-2c0-2.66 5.3-4 8-4zm0-2a4 4 0 100-8 4 4 0 000 8z"/></svg>
          </div>
          <div class="profile-detail-text">
            <div class="profile-detail-label">Full Name</div>
            <div class="profile-detail-value">{{ auth()->user()->name }}</div>
          </div>
        </div>

        <div class="profile-detail-item">
          <div class="profile-detail-icon">
            <svg viewBox="0 0 24 24"><path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
          </div>
          <div class="profile-detail-text">
            <div class="profile-detail-label">Email Address</div>
            <div class="profile-detail-value">{{ auth()->user()->email }}</div>
          </div>
        </div>

        <div class="profile-detail-item">
          <div class="profile-detail-icon">
            <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
          </div>
          <div class="profile-detail-text">
            <div class="profile-detail-label">Role</div>
            <div class="profile-detail-value">{{ auth()->user()->role ?? 'Member' }}</div>
          </div>
        </div>

        <div class="profile-detail-item">
          <div class="profile-detail-icon">
            <svg viewBox="0 0 24 24"><path d="M7 10V7a5 5 0 0110 0v3h1a1 1 0 011 1v9a1 1 0 01-1 1H6a1 1 0 01-1-1v-9a1 1 0 011-1h1zm2 0h6V7a3 3 0 00-6 0v3z"/></svg>
          </div>
          <div class="profile-detail-text">
            <div class="profile-detail-label">Member Since</div>
            <div class="profile-detail-value">{{ auth()->user()->created_at->format('d M, Y') }}</div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection