<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Langify: Website for Language Learning">
    <title>@yield('tab-title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icon/globe2.svg') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
        as="style">

    @yield('cdn-links')
</head>

<body>

    <header class="topbar">
        <button onclick=toggleSidebar() id="sidebartoggle"><i class="bi bi-list"></i></button>
        <h1><i class="bi bi-globe2"></i>Langify</h1>
    </header>


    <!-- Sidebar closed helper for mobile -->
    <nav class="sidebar closed">
        <h1><i class="bi bi-globe2"></i>Langify</h1>
        <ol>
            <li class="{{ $active_route == 'dashboard' ? 'active' : '' }}"><a href="{{ url((Auth::guard('student_guard')->check() ? 'student' : 'teacher').'/') }}"><i
                        class="bi bi-house"></i>Dashboard</a></li>
            <li class="{{ $active_route == 'classroom' ? 'active' : '' }}"><a href="{{ url((Auth::guard('student_guard')->check() ? 'student' : 'teacher').'/classroom') }}"><i
                        class="bi bi-book"></i>My Class Room</a></li>
            <li class="{{ $active_route == 'account_settings' ? 'active' : '' }}"><a
                    href="{{ url((Auth::guard('student_guard')->check() ? 'student' : 'teacher').'/account_settings') }}"><i class="bi bi-person-rolodex"></i>Account
                    Settings</a></li>
            <li class=""><a href="{{ url('logout') }}"><i class="bi bi-door-open"></i>Sign Out</a></li>
        </ol>
        <div class="account-box">
            <img src="{{ asset('assets/img/2532369.jpg') }}" alt="" loading="lazy">
            <div class="account-details">
                @if (Auth::guard('student_guard')->check())
                    <p>{{Auth::guard('student_guard')->user()->globalname}}</p>
                    <span>{{Auth::guard('student_guard')->user()->globalusername}}</span>
                @endif
                @if (Auth::guard('teacher_guard')->check())
                    <p>{{Auth::guard('teacher_guard')->user()->globalname}}</p>
                    <span>{{Auth::guard('teacher_guard')->user()->globalusername}}</span>
                @endif

            </div>
        </div>
    </nav>

    <div class="content">
        @if (Session::has('notification'))
        <div class="notification">
            <span>{{ Session::get('notification') }}</span>
        </div>
        @endif

        <main>
            @yield('content')
        </main>


        <footer>Copyright Langify</footer>
    </div>



    <script src="{{ asset('assets/js/index.js') }}"></script>
</body>

</html>
