

<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/social-blog/public/">Social Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="dashboard">Dashboard</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('account') }}">Account</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>

      <form  action="{{ route('logout') }}" class="form-inline mt-2 mt-md-0">
         <button class="btn btn-danger  my-2 my-sm-0 mx-2" type="submit">Log out</button>
      </form>

    </div>
  </nav>
</header>