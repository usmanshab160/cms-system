{{-- 
<!-- ════════════════ NAVBAR ════════════════ -->
<nav class="navbar" id="navbar">
  <div class="container">
    <div class="nav-inner">
      <a href="#" class="logo">
        <div class="logo-icon">
          <svg viewBox="0 0 24 24"><path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/></svg>
        </div>
        <span class="logo-text" style="color: #7c5cfc">clever</span>
      </a>
      <ul class="nav-links">
        <li><a href="{{ url('http://127.0.0.1:8000/')}}" class="active">Home</a></li>
        <li><a href="{{ url('http://127.0.0.1:8000/blog-create')}}">Add Blog</a></li>
        <li><a href="http://127.0.0.1:8000/blogs">Blogs</a></li>
        <li><a href="{{ url('http://127.0.0.1:8000/pricing')}}">Pricing</a></li>
      </ul>
      <div class="nav-auth">
        @auth
          <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="btn-primary">Logout</button>
          </form>
        @else
          <a href="{{ url('http://127.0.0.1:8000/signup') }}">
            <button class="btn-primary">Get Started</button>
          </a>
        @endauth
      </div>
      <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
  <div class="mobile-menu" id="mobile-menu">
    <a href="{{ url('http://127.0.0.1:8000/')}}">Home</a>
    <a href="{{ url('http://127.0.0.1:8000/create')}}">Add Blog</a>
    <a href="http://127.0.0.1:8000/blogs">Blogs</a>
    <a href="{{ url('http://127.0.0.1:8000/pricing')}}">Pricing</a>
    <div class="mobile-divider"></div>
    <div class="mobile-auth">
      @auth
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn-primary">Logout</button>
        </form>
      @else
        <a href="{{ url('http://127.0.0.1:8000/signup') }}">
          <button class="btn-primary" style="width:100%;">Get Started</button>
        </a>
      @endauth
    </div>
  </div>
</nav> --}}


<!-- ════════════════ NAVBAR ════════════════ -->
<nav class="navbar" id="navbar">
  <div class="container">
    <div class="nav-inner">
      <a href="{{ url('/') }}" class="logo">
        <div class="logo-icon">
          <svg viewBox="0 0 24 24"><path d="M13 2L4.5 13.5H11L10 22L20.5 10H14L13 2Z"/></svg>
        </div>
        <span class="logo-text" style="color: #7c5cfc">clever</span>
      </a>

      <ul class="nav-links">
        <li><a href="{{ url('/') }}" class="active">Home</a></li>
        <li><a href="{{ url('/blog-create') }}">Add Blog</a></li>
        <li><a href="{{ url('/blogs') }}">Blogs</a></li>
        <li><a href="{{ url('/pricing') }}">Pricing</a></li>
      </ul>

      <div class="nav-auth">
        @auth
          <div class="profile-wrap" id="profile-wrap">
            <button class="profile-trigger" id="profile-trigger" type="button">
              <div class="profile-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
              <span class="profile-name">{{ explode(' ', auth()->user()->name)[0] }}</span>
              <svg class="chevron" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>
            </button>

            <div class="profile-dropdown" id="profile-dropdown">
              <div class="profile-dd-header">
                <div class="profile-dd-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="profile-dd-info">
                  <div class="profile-dd-name">{{ auth()->user()->name }}</div>
                  <div class="profile-dd-email">{{ auth()->user()->email }}</div>
                  <div class="profile-dd-role">{{ auth()->user()->role }}</div>
                </div>
              </div>
              <form method="POST" action="{{ route('logout') }}" class="profile-dd-logout-form">
                @csrf
                <button type="submit" class="btn-dd-logout">
                  <svg viewBox="0 0 24 24"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"/><path d="M20 3H9c-1.1 0-2 .9-2 2v4h2V5h11v14H9v-4H7v4c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg>
                  Logout
                </button>
              </form>
            </div>
          </div>
        @else
          <a href="{{ url('/signup') }}">
            <button class="btn-primary">Get Started</button>
          </a>
        @endauth
      </div>

      <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>

  <div class="mobile-menu" id="mobile-menu">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ url('/blog-create') }}">Add Blog</a>
    <a href="{{ url('/blogs') }}">Blogs</a>
    <a href="{{ url('/pricing') }}">Pricing</a>
    <div class="mobile-divider"></div>
    <div class="mobile-auth">
      @auth
        <div class="mobile-profile-card">
          <div class="profile-dd-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
          <div class="profile-dd-info">
            <div class="profile-dd-name">{{ auth()->user()->name }}</div>
            <div class="profile-dd-email">{{ auth()->user()->email }}</div>
            <div class="profile-dd-role">{{ auth()->user()->role }}</div>
          </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn-dd-logout" style="width:100%;">
            <svg viewBox="0 0 24 24"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"/><path d="M20 3H9c-1.1 0-2 .9-2 2v4h2V5h11v14H9v-4H7v4c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg>
            Logout
          </button>
        </form>
      @else
        <a href="{{ url('/signup') }}">
          <button class="btn-primary" style="width:100%;">Get Started</button>
        </a>
      @endauth
    </div>
  </div>
</nav>