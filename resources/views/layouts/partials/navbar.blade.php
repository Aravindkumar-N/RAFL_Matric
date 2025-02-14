<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ url('/dashboard') }}"><img
                src="{{ asset('assets/images/logo_rafl.PNG') }}" class="mr-2" alt="logo" />RAFL</a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboard') }}"><img
                src="{{  asset('assets/images/logo_rafl.PNG') }}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        {{-- <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                        <span class="input-group-text" id="search">
                            <i class="icon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                        aria-label="search" aria-describedby="search">
                </div>
            </li>
        </ul> --}}
        @php
        $id = Auth::user()->id;
        $user_detail = \App\Models\User::where('id',$id)->first();
        @endphp
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{ asset(!empty($user_detail->profile) ? $user_detail->profile : 'assets/images/profile_icon.webp') }}" alt="profile" />
                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{route('change.profile',''.$id)}}">
                        <i class="bi bi-person-circle text-primary"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="{{route('change.password')}}">
                        <i class="bi bi-pencil-square text-primary"></i>
                        Change Password
                    </a>
                    {{-- <a class="dropdown-item" href="#">
                        <i class="ti-settings text-primary"></i>
                        Settings
                    </a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  <i class="bi bi-box-arrow-right text-danger"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
