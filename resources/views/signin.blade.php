@extends('layouts.app')
@section('content')

<div class="page">
 
  <!-- ══════ LEFT VISUAL PANEL ══════ -->
  <div class="visual-panel">
    <div class="grid-pattern"></div>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
 
    <a href="index.html" class="panel-logo">
      <div class="panel-logo-icon">
        <svg viewBox="0 0 24 24"><path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/></svg>
      </div>
      <span class="panel-logo-text">clever</span>
    </a>
 
    <div class="panel-copy">
      <div class="panel-tag">
        <span class="panel-dot"></span>
        Welcome back
      </div>
      <h2 class="panel-title">Your content<br/>is waiting<br/><span class="hl">for you.</span></h2>
      <p class="panel-desc">Sign back in and pick up right where you left off. Your team, drafts, and analytics are all here.</p>
 
      <div class="panel-stats">
        <div class="stat-item">
          <div class="stat-val">4.2<span>K+</span></div>
          <div class="stat-lbl">Active teams</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <div class="stat-val">99<span>%</span></div>
          <div class="stat-lbl">Uptime SLA</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <div class="stat-val">2<span>M+</span></div>
          <div class="stat-lbl">Pages published</div>
        </div>
      </div>
 
      <!-- Testimonial -->
      <div class="testimonial">
        <p class="testi-text">Clever CMS completely transformed how our marketing team manages content. We publish 3× faster now.</p>
        <div class="testi-author">
          <div class="testi-avatar">SR</div>
          <div>
            <div class="testi-name">Sara Raza</div>
            <div class="testi-role">Marketing Lead, TechCorp</div>
          </div>
          <div class="testi-stars">
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          </div>
        </div>
      </div>
    </div>
 
    <div class="panel-proof">
      <div class="proof-avatars">
        <span>AK</span><span>MR</span><span>JS</span><span>LP</span><span>+4</span>
      </div>
      <div class="proof-text">
        <strong>4,200+ teams</strong> trust Clever CMS<br/>
        ⭐ 4.9/5 · 800+ reviews
      </div>
    </div>
  </div>
 
 
  <!-- ══════ RIGHT FORM PANEL ══════ -->
  <div class="form-panel">
    <div class="form-box">
 
      <div class="form-header">
        <div class="form-eyebrow">Welcome back</div>
        <h1 class="form-title">Sign in to Clever</h1>
        <p class="form-sub">Don't have an account? <a href="clever-signup.html">Create one free →</a></p>
      </div>
 
      <!-- Social Login -->
      <div class="social-login">
        <button class="social-btn" type="button">
          <svg viewBox="0 0 24 24">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
          </svg>
          Google
        </button>
        <button class="social-btn" type="button">
          <svg viewBox="0 0 24 24" fill="#1877F2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          Facebook
        </button>
        <button class="social-btn" type="button">
          <svg viewBox="0 0 24 24" fill="#181717"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
          GitHub
        </button>
      </div>
 
      <div class="divider"><span>or continue with email</span></div>
 
      <!-- Alert box -->
      <div class="alert-box" id="alertBox">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12" style="stroke:#fff;stroke-width:2;fill:none"/><line x1="12" y1="16" x2="12.01" y2="16" style="stroke:#fff;stroke-width:2;fill:none"/></svg>
        <span id="alertMsg">Invalid email or password. Please try again.</span>
      </div>
 
      <!-- Form -->
      {{-- <form class="signin-form" id="signinForm" novalidate>
 
        <!-- Email -->
        <div class="field">
          <label for="email">Email Address <span class="req">*</span></label>
          <div class="input-wrap">
            <span class="input-icon">
              <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </span>
            <input type="email" id="email" name="email" placeholder="ali@example.com" autocomplete="email"/>
          </div>
          <span class="field-error" id="email-err">Please enter a valid email address.</span>
        </div>
 
        <!-- Password -->
        <div class="field">
          <div class="field-row">
            <label for="password">Password <span class="req">*</span></label>
            <a href="forgot-password.html" class="forgot-link">Forgot password?</a>
          </div>
          <div class="input-wrap">
            <span class="input-icon">
              <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </span>
            <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password"/>
            <button type="button" class="pwd-toggle" id="togglePwd" aria-label="Toggle password visibility">
              <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
          <span class="field-error" id="pwd-err">Please enter your password.</span>
        </div>
 
        <!-- Remember me -->
        <div class="remember-row">
          <input type="checkbox" id="remember" name="remember"/>
          <label for="remember">Keep me signed in for 30 days</label>
        </div>
 
        <!-- Submit -->
        <button type="submit" class="btn-submit" id="submitBtn">
          <span class="btn-text" style="display:flex;align-items:center;gap:8px;">
            Sign In
            <svg viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
          </span>
          <span class="spinner"></span>
        </button>
 
      </form> --}}

      {{-- Custome Addition --}}

      <form class="signin-form" id="signinForm" method="POST" action="{{ route('login') }}" novalidate>

    @csrf

    <!-- Email -->
    <div class="field">

        <label for="email">
            Email Address <span class="req">*</span>
        </label>

        <div class="input-wrap">

            <span class="input-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
            </span>

            <input 
                type="email"
                id="email"
                name="email"
                placeholder="ali@example.com"
                autocomplete="email"
                value="{{ old('email') }}"
                required
            />

        </div>

        {{-- Laravel Validation Error --}}
        @error('email')
            <span class="field-error">{{ $message }}</span>
        @enderror

        <span class="field-error" id="email-err">
            Please enter a valid email address.
        </span>

    </div>

    <!-- Password -->
    <div class="field">

        <div class="field-row">

            <label for="password">
                Password <span class="req">*</span>
            </label>

            {{-- Forgot Password --}}
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">
                    Forgot password?
                </a>
            @endif

        </div>

        <div class="input-wrap">

            <span class="input-icon">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </span>

            <input 
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
                autocomplete="current-password"
                required
            />

            <button type="button" class="pwd-toggle" id="togglePwd" aria-label="Toggle password visibility">

                <svg viewBox="0 0 24 24">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>

            </button>

        </div>

        {{-- Laravel Validation Error --}}
        @error('password')
            <span class="field-error">{{ $message }}</span>
        @enderror

        <span class="field-error" id="pwd-err">
            Please enter your password.
        </span>

    </div>

    <!-- Remember me -->
    <div class="remember-row">

        <input 
            type="checkbox"
            id="remember"
            name="remember"
        />

        <label for="remember">
            Keep me signed in for 30 days
        </label>

    </div>

    <!-- Submit -->
    <button type="submit" class="btn-submit" id="submitBtn">

        <span class="btn-text" style="display:flex;align-items:center;gap:8px;">

            Sign In

            <svg viewBox="0 0 24 24">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                <polyline points="10 17 15 12 10 7"/>
                <line x1="15" y1="12" x2="3" y2="12"/>
            </svg>

        </span>

        <span class="spinner"></span>

    </button>

</form>
 
      <!-- Success state -->
      <div class="success-state" id="successState">
        <div class="success-icon">
          <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <div class="success-title">Welcome back! 👋</div>
        <p class="success-desc">You're signed in successfully. Redirecting you to your dashboard now…</p>
        <a href="#" class="btn-dashboard">
          Go to Dashboard
          <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
 
      <p class="signup-link">New to Clever CMS? <a href="{{ url('http://127.0.0.1:8000/signup')}}">Create a free account →</a></p>
 
    </div>
  </div>
 
</div>

@endsection