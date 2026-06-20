@extends('layouts.app')
@section('content')
 
<div class="page">
 
  <!-- ══════ LEFT VISUAL PANEL ══════ -->
  <div class="visual-panel">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
 
    <!-- Logo -->
    <a href="index.html" class="panel-logo">
      <div class="panel-logo-icon">
        <svg viewBox="0 0 24 24"><path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/></svg>
      </div>
      <span class="panel-logo-text">clever</span>
    </a>
 
    <!-- Copy -->
    <div class="panel-copy">
      <div class="panel-tag">
        <span class="panel-dot"></span>
        Start for free today
      </div>
      <h2 class="panel-title">Your content,<br/><span class="hl">your rules.</span><br/>Your platform.</h2>
      <p class="panel-desc">Join thousands of teams who manage, publish, and grow their content with Clever CMS — the platform built for speed and clarity.</p>
 
      <div class="feature-pills">
        <div class="feat-pill">
          <div class="feat-pill-icon">
            <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
          </div>
          <div>
            <div class="feat-pill-text">Drag-and-Drop Editor</div>
            <div class="feat-pill-sub">No coding needed, ever</div>
          </div>
        </div>
        <div class="feat-pill">
          <div class="feat-pill-icon">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <div>
            <div class="feat-pill-text">Role-Based Team Access</div>
            <div class="feat-pill-sub">Invite unlimited members</div>
          </div>
        </div>
        <div class="feat-pill">
          <div class="feat-pill-icon">
            <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          </div>
          <div>
            <div class="feat-pill-text">Real-Time Analytics</div>
            <div class="feat-pill-sub">Track every page & post</div>
          </div>
        </div>
      </div>
    </div>
 
    <!-- Social proof -->
    <div class="panel-proof">
      <div class="proof-avatars">
        <span>AK</span><span>MR</span><span>JS</span><span>LP</span><span>+4</span>
      </div>
      <div class="proof-text">
        <strong>4,200+ teams</strong> already on board<br/>
        ⭐ 4.9/5 · Free 14-day trial
      </div>
    </div>
  </div>
 
 
  <!-- ══════ RIGHT FORM PANEL ══════ -->
  <div class="form-panel">
    <div class="form-box">
 
      <!-- Header -->
      <div class="form-header">
        <div class="form-eyebrow">Get started — it's free</div>
        <h1 class="form-title">Create your account</h1>
        <p class="form-sub">Already have an account? <a href="signin.html">Sign in →</a></p>
      </div>
 
      <!-- Social Login -->
      <div class="social-login">
        <button class="social-btn" type="button">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
          </svg>
          Continue with Google
        </button>
        <button class="social-btn" type="button">
          <svg viewBox="0 0 24 24" fill="#1877F2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          Continue with Facebook
        </button>
      </div>
 
      <!-- Divider -->
      <div class="divider"><span>or sign up with email</span></div>
 
      <!-- Form -->
      {{-- <form class="signup-form" id="signupForm" novalidate>
 
        <!-- Name row -->
        <div class="row-2">
          <div class="field">
            <label for="fname">First Name <span class="req">*</span></label>
            <div class="input-wrap">
              <span class="input-icon">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              </span>
              <input type="text" id="fname" name="fname" placeholder="Ali" autocomplete="given-name"/>
            </div>
            <span class="field-error" id="fname-err">Please enter your first name.</span>
          </div>
          <div class="field">
            <label for="lname">Last Name <span class="req">*</span></label>
            <div class="input-wrap">
              <span class="input-icon">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              </span>
              <input type="text" id="lname" name="lname" placeholder="Khan" autocomplete="family-name"/>
            </div>
            <span class="field-error" id="lname-err">Please enter your last name.</span>
          </div>
        </div>
 
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
 
        <!-- Role -->
        <div class="field">
          <label for="role">Your Role <span class="req">*</span></label>
          <div class="input-wrap select-wrap">
            <span class="input-icon">
              <svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
            </span>
            <select id="role" name="role">
              <option value="" disabled selected>Select your role…</option>
              <option>Student</option>
              <option>Content Writer</option>
              <option>Developer</option>
              <option>Marketing Manager</option>
              <option>Business Owner</option>
              <option>Other</option>
            </select>
          </div>
          <span class="field-error" id="role-err">Please select your role.</span>
        </div>
 
        <!-- Password -->
        <div class="field">
          <label for="password">Password <span class="req">*</span></label>
          <div class="input-wrap">
            <span class="input-icon">
              <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </span>
            <input type="password" id="password" name="password" placeholder="Min. 8 characters" autocomplete="new-password"/>
            <button type="button" class="pwd-toggle" id="togglePwd" aria-label="Show password">
              <svg id="eyeIcon" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
          <div class="pwd-strength" id="pwdStrength" style="display:none">
            <div class="strength-bars">
              <div class="strength-bar" id="sb1"></div>
              <div class="strength-bar" id="sb2"></div>
              <div class="strength-bar" id="sb3"></div>
              <div class="strength-bar" id="sb4"></div>
            </div>
            <span class="strength-label" id="strengthLabel">Enter a password</span>
          </div>
          <span class="field-error" id="pwd-err">Password must be at least 8 characters.</span>
        </div>
 
        <!-- Confirm Password -->
        <div class="field">
          <label for="confirm">Confirm Password <span class="req">*</span></label>
          <div class="input-wrap">
            <span class="input-icon">
              <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </span>
            <input type="password" id="confirm" name="confirm" placeholder="Re-enter password" autocomplete="new-password"/>
            <button type="button" class="pwd-toggle" id="toggleConfirm" aria-label="Show password">
              <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
          <span class="field-error" id="confirm-err">Passwords do not match.</span>
        </div>
 
        <!-- Terms -->
        <div class="terms-row">
          <input type="checkbox" id="terms" name="terms"/>
          <label for="terms">
            I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a> of Clever CMS.
          </label>
        </div>
        <span class="field-error" id="terms-err">You must accept the terms to continue.</span>
 
        <!-- Submit -->
        <button type="submit" class="btn-submit" id="submitBtn">
          <span class="btn-text" style="display:flex;align-items:center;gap:8px;">
            Create Free Account
            <svg viewBox="0 0 24 24"><path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/></svg>
          </span>
          <span class="spinner"></span>
        </button>
 
      </form> --}}


 {{-- Custom additions --}}

{{-- <form class="signup-form" id="signupForm" method="POST" action="{{ route('register') }}" novalidate> --}}
    <form class="signup-form" id="signupForm"
      method="POST"
      action="{{ route('register') }}">
    @csrf

    <!-- Name row -->
    <div class="row-2">

        <!-- First Name -->
        <div class="field">
            <label for="fname">First Name <span class="req">*</span></label>

            <div class="input-wrap">
                <span class="input-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </span>

                <input 
                    type="text"
                    id="fname"
                    name="fname"
                    placeholder="Ali"
                    autocomplete="given-name"
                    value="{{ old('fname') }}"
                    required
                />
            </div>

            @error('fname')
                <span class="field-error">{{ $message }}</span>
            @enderror

            <span class="field-error" id="fname-err">
                Please enter your first name.
            </span>
        </div>

        <!-- Last Name -->
        <div class="field">
            <label for="lname">Last Name <span class="req">*</span></label>

            <div class="input-wrap">
                <span class="input-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </span>

                <input 
                    type="text"
                    id="lname"
                    name="lname"
                    placeholder="Khan"
                    autocomplete="family-name"
                    value="{{ old('lname') }}"
                    required
                />
            </div>

            @error('lname')
                <span class="field-error">{{ $message }}</span>
            @enderror

            <span class="field-error" id="lname-err">
                Please enter your last name.
            </span>
        </div>

    </div>

    <!-- Hidden Full Name -->
    <input type="hidden" name="name" id="fullName">

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

        @error('email')
            <span class="field-error">{{ $message }}</span>
        @enderror

        <span class="field-error" id="email-err">
            Please enter a valid email address.
        </span>

    </div>

    <!-- Role -->
    <div class="field">

        <label for="role">
            Your Role <span class="req">*</span>
        </label>

        <div class="input-wrap select-wrap">

            <span class="input-icon">
                <svg viewBox="0 0 24 24">
                    <rect x="2" y="7" width="20" height="14" rx="2"/>
                    <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                </svg>
            </span>

            <select id="role" name="role" required>
                <option value="" disabled selected>Select your role…</option>

                <option value="Student">Student</option>
                <option value="Content Writer">Content Writer</option>
                <option value="Developer">Developer</option>
                <option value="Marketing Manager">Marketing Manager</option>
                <option value="Business Owner">Business Owner</option>
                <option value="Other">Other</option>
            </select>

        </div>

        @error('role')
            <span class="field-error">{{ $message }}</span>
        @enderror

        <span class="field-error" id="role-err">
            Please select your role.
        </span>

    </div>

    <!-- Password -->
    <div class="field">

        <label for="password">
            Password <span class="req">*</span>
        </label>

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
                placeholder="Min. 8 characters"
                autocomplete="new-password"
                required
            />

            <button type="button" class="pwd-toggle" id="togglePwd" aria-label="Show password">
                <svg id="eyeIcon" viewBox="0 0 24 24">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
            </button>

        </div>

        <div class="pwd-strength" id="pwdStrength" style="display:none">
            <div class="strength-bars">
                <div class="strength-bar" id="sb1"></div>
                <div class="strength-bar" id="sb2"></div>
                <div class="strength-bar" id="sb3"></div>
                <div class="strength-bar" id="sb4"></div>
            </div>

            <span class="strength-label" id="strengthLabel">
                Enter a password
            </span>
        </div>

        @error('password')
            <span class="field-error">{{ $message }}</span>
        @enderror

        <span class="field-error" id="pwd-err">
            Password must be at least 8 characters.
        </span>

    </div>

    <!-- Confirm Password -->
    <div class="field">

        <label for="confirm">
            Confirm Password <span class="req">*</span>
        </label>

        <div class="input-wrap">

            <span class="input-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
            </span>

            <input 
                type="password"
                id="confirm"
                name="password_confirmation"
                placeholder="Re-enter password"
                autocomplete="new-password"
                required
            />

            <button type="button" class="pwd-toggle" id="toggleConfirm" aria-label="Show password">
                <svg viewBox="0 0 24 24">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
            </button>

        </div>

        <span class="field-error" id="confirm-err">
            Passwords do not match.
        </span>

    </div>

    <!-- Terms -->
    <div class="terms-row">

        <input type="checkbox" id="terms" name="terms" required/>

        <label for="terms">
            I agree to the 
            <a href="#">Terms of Service</a> 
            and 
            <a href="#">Privacy Policy</a> 
            of Clever CMS.
        </label>

    </div>

    <span class="field-error" id="terms-err">
        You must accept the terms to continue.
    </span>

    <!-- Submit -->
    <button type="submit" class="btn-submit" id="submitBtn">

        <span class="btn-text" style="display:flex;align-items:center;gap:8px;">
            Create Free Account

            <svg viewBox="0 0 24 24">
                <path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/>
            </svg>
        </span>

        <span class="spinner"></span>

    </button>

</form> 
      <!-- Success Message -->
      <div class="success-state" id="successState">
        <div class="success-icon">
          <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <div class="success-title">Account Created! 🎉</div>
        <p class="success-desc">Welcome to Clever CMS. Check your inbox to verify your email address and get started.</p>
      </div>
 
    <p class="signin-link">Already have an account? <a href="{{ url('http://127.0.0.1:8000/signin') }}">Sign in here →</a></p>
 
    </div>
  </div>
 
</div>

@endsection