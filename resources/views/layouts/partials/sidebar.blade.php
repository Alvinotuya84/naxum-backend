<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{ Avatar::create(Auth::user()->full_name)->toBase64() }}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{Auth::user()->full_name }}</span>
            <span class="text-secondary text-small">Admin</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>

      <li class="nav-item sidebar-actions">
        <span class="nav-link">
          <div class="border-bottom">
            <h6 class="font-weight-normal mb-3">Accounts</h6>
          </div>

          <a href="{{route('users.create')}}" class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a account</a>
        </span>

        <a class="nav-link" href="{{route('users.index')}}">
            <span class="menu-title">Accounts</span>
            <i class="mdi mdi-account-group menu-icon"></i>          </a>
      </li>
    </ul>
  </nav>