<div class="header professional-header">

    <!-- Logo -->
    <x-logo />
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);" class="transition">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">
        <h3 class="mb-0">{{ Theme('name') ?? config('app.name') }}</h3>
    </div>
    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa-solid fa-bars"></i></a>

    <!-- Header Menu -->
    <ul class="nav user-menu align-items-center">

        <!-- Live Clock -->
        <li class="nav-item header-clock me-3">
            <div class="clock-widget">
                <div class="clock-time" id="headerClock">
                    <i class="bi bi-clock me-2"></i>
                    <span id="currentTime">--:--:--</span>
                </div>
                <div class="clock-date" id="currentDate">
                    <small>--</small>
                </div>
            </div>
        </li>

        <!-- Theme Toggle -->
        <li class="nav-item me-3">
            <button class="theme-toggle-btn" id="themeToggle" type="button" title="Toggle Dark/Light Mode">
                <i class="bi bi-sun-fill theme-icon-light"></i>
                <i class="bi bi-moon-fill theme-icon-dark"></i>
            </button>
        </li>

        <!-- User Profile Dropdown -->
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="{{ !empty(auth()->user()->avatar) ? uploadedAsset(auth()->user()->avatar,'users'): asset('images/user.jpg') }}" alt="User Image">
                    <span class="status online"></span>
                </span>
                <span class="user-name">{{ auth()->user()->fullname }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <div class="dropdown-header">
                    <div class="d-flex align-items-center">
                        <img src="{{ !empty(auth()->user()->avatar) ? uploadedAsset(auth()->user()->avatar,'users'): asset('images/user.jpg') }}"
                             alt="User" class="rounded-circle me-2" width="40" height="40">
                        <div>
                            <div class="fw-bold">{{ auth()->user()->fullname }}</div>
                            <small class="text-muted">{{ auth()->user()->email }}</small>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('profile') }}">
                    <i class="bi bi-person me-2"></i>{{ __('My Profile') }}
                </a>
                <a class="dropdown-item" href="{{ route('settings.index') }}">
                    <i class="bi bi-gear me-2"></i>{{ __('Settings') }}
                </a>
                <div class="dropdown-divider"></div>
                <a onclick="document.getElementById('logout_user_form').submit()" class="dropdown-item text-danger logout_btn" href="javascript:void(0);">
                    <i class="bi bi-box-arrow-right me-2"></i>{{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <div class="dropdown-header">
                <strong>{{ auth()->user()->fullname }}</strong>
            </div>
            <a class="dropdown-item" href="{{ route('profile') }}">
                <i class="bi bi-person me-2"></i>My Profile
            </a>
            <a class="dropdown-item" href="{{ route('settings.index') }}">
                <i class="bi bi-gear me-2"></i>Settings
            </a>
            <div class="dropdown-divider"></div>
            <a onclick="document.getElementById('logout_user_form').submit()" class="dropdown-item text-danger logout_btn" href="javascript:void(0);">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </a>
        </div>
    </div>
    <!-- /Mobile Menu -->
    <form action="{{ route('logout') }}" id="logout_user_form" method="post">@csrf</form>

</div>
