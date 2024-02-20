@extends("layouts.cdn")

@section("css")
<link rel="stylesheet" href="/css/admin/admin.css">
@endsection

@section("body")

{{-- <div id="preloader">
    <div id="status">&nbsp;</div>
  </div> --}}
  <header class="header" id="header">
    <div id="header-toggle" class="header_toggle"> 
      <i class='bx bx-menu' ></i> 
    </div>
    <div class="header_img"> 
      <img src="{{ Auth::user() && Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : asset('avatar.jpg') }}" alt=""> 
    </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> 
          <a href="/" class="nav_logo"> 
            <i class='bx bx-play-circle nav_logo-icon'></i> 
            <span class="nav_logo-name">The Showplace</span> 
          </a>
            <div id="nav_list" class="nav_list"> 
              <a href="/adminpanel" class="nav_link active"> 
                <i class='bx bx-grid-alt nav_icon'></i> 
                <span class="nav_name">Dashboard</span> 
              </a> 
              <a href="/adminpanel/addonscreenmovie" class="nav_link"> 
                <i class='bx bx-movie nav_icon'></i> 
                <span class="nav_name">Add On Screen Movie</span> 
              </a> 
              <a href="/adminpanel/insertReleasingSoonMovie" class="nav_link"> 
                <i class='bx bx-movie-play nav_icon'></i> 
                <span class="nav_name">Add Releasing Soon Movie</span> 
              </a> 
              <a href="/adminpanel/#users" class="nav_link"> 
                <i class='bx bx-user nav_icon'></i> 
                <span class="nav_name">Users</span> 
              </a> 
              <a href="/adminpanel/managetheatres" class="nav_link"> 
                <i class='bi bi-projector nav_icon'></i> 
                <span class="nav_name">Manage Theatres</span> 
              </a> 
            </div>
        </div> 
        <a href="#" class="nav_link"> 
          <i class='bx bx-log-out nav_icon'></i> 
          <span class="nav_name">SignOut</span> 
        </a>
    </nav>
  </div>

  @yield('adminbody')
  


  @section('js')
  
  <script src="/js/admin.js"></script>
  @endsection

  @endsection