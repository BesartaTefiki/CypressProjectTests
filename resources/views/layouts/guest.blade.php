<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f3e8ff; /* Soft lavender background */
            color: #333; /* Slightly darker text for better readability */
            margin: 0;
            padding: 0;
            line-height: 1.6; /* Improved line spacing for readability */
        }
        nav {
            background-color: #7b2cbf; /* Deep violet for the navbar */
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Subtle shadow for depth */
        }
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        .nav-link {
            color: white;
            text-decoration: none;
            margin: 0 1rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #e0aaff; /* Light violet for hover effect */
        }
        .brand {
            font-weight: 700;
            font-size: 2rem; /* Slightly larger for prominence */
            color: white;
            font-family: 'Dancing Script', cursive; /* Stylish font for the brand */
        }
        .main-content {
            padding: 2rem 5%;
        }
        footer {
            background-color: #5a189a; /* Darker violet for footer */
            color: white;
            padding: 1rem 0;
            text-align: center;
        }
        .footer-content {
            max-width: 1200px;
            margin: auto;
            padding: 0 2rem;
        }
        .footer-section {
            margin-bottom: 1rem;
        }
        .footer-section h3 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
        }
        .footer-section p {
            font-size: 1rem;
            line-height: 1.5;
        }
        .social-icons a {
            display: inline-block;
            margin-right: 1rem;
            font-size: 1.5rem;
            color: white;
            transition: color 0.3s ease;
        }
        .social-icons a:hover {
            color: #e0aaff; /* Light violet for hover effect */
        }
        .special-link {
            background-color: #9d4edd; /* Medium violet */
            border-radius: 5px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
            color: white; /* Ensuring text is white */
        }
        .special-link:hover {
            background-color: #c77dff; /* Lighter violet for hover */
        }
        .nav-link.my-profile {
            background-color: #9d4edd; /* Medium violet */
            border-radius: 5px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
            color: white; /* Ensuring text is white */
        }
        .nav-link.my-profile:hover {
            background-color: #c77dff; /* Lighter violet for hover */
        }
    </style>
    
</head>
<body>
<nav>
    <div class="nav-container">
        <a class="brand" href="/">Erbora's beauty!</a>
        <div>
            <a class="nav-link" href="/">Home</a>
            <a class="nav-link" href="{{ route('services.index') }}">Services & Products</a>
            <a class="nav-link" href="{{ route('appointments.step-one') }}">Book Your Appointment</a>

                <!-- Register and Login Links with additional styling -->
                @if (Auth::guest())
            
                <a class="nav-link special-link" href="{{ route('login') }}">Login</a>
                <a class="nav-link special-link" href="{{ route('register') }}">Register</a>
            @else
            <a class="nav-link my-profile" href="{{ route('profile.edit') }}">My Profile</a>

            <a class="nav-link special-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
             Logout
         </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endif
        </div>
    </div>
</nav>

<div class="main-content">
    {{ $slot }}
</div>
</body>
</html>
