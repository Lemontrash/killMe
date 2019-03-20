<html>
    <head>
        <title>Profile</title>
        @include('headAssets')
        <link href="{{ asset('css/common.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    </head>
   
    <body>
      
      <header id="profile_header">
        <div class="logo-wrap">
            <a href="{{route('home')}}">
                <img src="/img/logo.png" alt="">
            </a>
        </div>

        <div class="header-search-wrapper">
          <form class="header-search">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>

        <div class="profile-avatar profile-header-btn">
          <div class="img-wrap">
            <img src="/img/profile-avatar.png" alt="">
          </div>
        </div>

        <div class="notifications profile-header-btn">
          <div class="ico-wrap">
            <i class="fas fa-bell"></i>
          </div>
        </div>

        <div class="dots-wrapper profile-header-btn">
          <div class="ico-wrap">
            <i class="fas fa-ellipsis-h"></i>
          </div>
        </div>
      </header>

      <aside class="profile-nav">
          <ul class="links-container">
              <li class="link-item">
                  <i class="fas fa-check-circle"></i>
                  <a style="text-decoration: none; color: rgba(255, 255, 255, 0.5);" href="{{route('home')}}">Exchange</a>

              </li>
              <li class="link-item">
                  <i class="fas fa-exchange"></i>
                  <a style="text-decoration: none; color: rgba(255, 255, 255, 0.5);" href="{{route('home')}}">Currancy Rate</a>

              </li>
              <li class="link-item">
                  <i class="fas fa-chart-bar"></i>
                  <a style="text-decoration: none; color: rgba(255, 255, 255, 0.5);" href="{{route('filesHistory')}}"> Transition</a>

              </li>
              <li class="link-item">
                  <i class="fas fa-envelope"></i>
                  <a style="text-decoration: none; color: rgba(255, 255, 255, 0.5);" href="{{route('contactUs')}}">Contact</a>

              </li>
              <li class="link-item">
                  <i class="fas fa-question"></i>
                  <a style="text-decoration: none; color: rgba(255, 255, 255, 0.5);" href="{{route('faq')}}">FAQ</a>

              </li>
              <li class="link-item">
                  <i class="fas fa-cog"></i>
                  <a style="text-decoration: none; color: rgba(255, 255, 255, 0.5);" href="{{route('profileSettings')}}">Settings</a>
              </li>
              <li class="link-item">
                  <i class="fas fa-cog"></i>
                  <a style="text-decoration: none; color: rgba(255, 255, 255, 0.5);" href="{{route('home')}}">Admin</a>
              </li>
          </ul>
      </aside>

      <div class="profile-content">
        <div class="page-title">ADMIN PANEL</div>
       
        <table class="table" id="">
          <thead>
            <tr>
              <th>Name</th>
              <th>Registration Date</th>
              <th>Phone</th>
              <th class="text-center">Email</th>
              <th class="text-center">Aproved</th>
              <th class="text-center">Account</th>
            </tr>
          </thead>
          <tbody>
            <tr class="user">
              <th>John Snow</th>
              <th>02 / 02 /2019</th>
              <th>+380557744876</th>
              <th>Johnsnow14@gmail.com</th>
              <th class="text-center"><i class="fas fa-check-circle"></i></th>
              <th class="text-center">Individual</th>
            </tr>
            
          </tbody>
        </table>
      </div>

      @include('scriptAssets')
    </body>
</html>
