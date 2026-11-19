
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HealthSync - Specialists</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <!-- Header -->
    <header>
        <div class="header-inner">

            <div class="logo-area">
                <div class="logo-icon">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>

                <div class="logo-text">
                    <h1>HealthSync</h1>
                    <p>Clinic & Patient Management System</p>
                </div>
            </div>

            <div class="admin-profile">
                <div class="admin-icon">
                    <i class="fa-solid fa-user-shield"></i>
                </div>

                <div class="admin-info">
                    <div class="admin-name">Administrator</div>
                    <div class="admin-role">Main Branch</div>
                </div>
            </div>

        </div>
    </header>

    <!-- Navigation Bar -->
    <div class="nav-tabs-wrapper">
        <nav class="nav-tabs">

            <a href="#" class="tab">
                <i class="fa-solid fa-hospital-user"></i>
                Patient Records
            </a>

            <a href="{{ url('/doctors') }}"
               class="tab {{ request()->is('doctors*') ? 'active' : '' }}">
                <i class="fa-solid fa-user-doctor"></i>
                Specialists
            </a>

            <a href="#" class="tab">
                <i class="fa-solid fa-calendar-check"></i>
                Appointments
            </a>

            <a href="#" class="tab">
                <i class="fa-solid fa-pills"></i>
                Pharmacy Inventory
            </a>

        </nav>
    </div>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <script src="{{ asset('script.js') }}"></script>

</body>
</html>
