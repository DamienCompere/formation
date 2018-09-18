<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="/">Acceuil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/stage">Stage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/formation">Formation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact">Contact</a>
      </li>
    </ul>
  </div>
  @if(Auth::check())
  <div class="">
      <ul class="navbar-nav">
        <li class="nav-item"> <a href="{{ route('post.index') }}" class="nav-link">Dashboard</a></li>
        <li class="nav-item"> <a class="nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
      </a></li>
      </ul>
    
    

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
  </div>
    @else
    @endif
</nav>