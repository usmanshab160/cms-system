<!-- ════════════════ NAVBAR ════════════════ -->
{{-- <nav class="navbar" id="navbar">
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
        <li><a href="{{ url('http://127.0.0.1:8000/create')}}">Add Blog</a></li>
        <li><a href="#how">How it Works</a></li>
        <li><a href="{{ url('http://127.0.0.1:8000/pricing')}}">Pricing</a></li>
      </ul>
 
      <div class="nav-auth">
       <a href="{{ url('http://127.0.0.1:8000/signup') }}" ><button class="btn-primary">Get Started</button> </a>
      </div>
 
      <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
 
  <div class="mobile-menu" id="mobile-menu">
    <a href="#">Home</a>
    <a href="#features">Features</a>
    <a href="#how">How it Works</a>
    <a href="#">Pricing</a>
    <div class="mobile-divider"></div>
    <div class="mobile-auth">
      <button class="btn-ghost">Sign in</button>
      <button class="btn-primary">Get Started</button>
    </div>
  </div>
</nav> --}}


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
        <li><a href="{{ url('http://127.0.0.1:8000/create')}}">Add Blog</a></li>
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
</nav>