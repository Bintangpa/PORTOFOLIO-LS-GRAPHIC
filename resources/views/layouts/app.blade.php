<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', \App\Models\WebsiteSetting::getValue('site_name', 'LittleStar Studio') . ' - Portfolio')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            min-height: 100vh;
        }
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Navbar Navigation Styles */
        .navbar-nav .nav-link {
            font-weight: 500;
            color: #333 !important;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .navbar-nav .nav-link:hover {
            background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 153, 0.3);
        }
        
        .navbar-nav .nav-link.active {
            background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
            color: white !important;
            box-shadow: 0 4px 12px rgba(0, 0, 153, 0.4);
        }
        
        .navbar-nav .nav-link i {
            margin-right: 0.5rem;
            font-size: 0.9rem;
        }
        
        /* Search Form Styles */
        .navbar .input-group {
            width: 280px;
        }
        
        .navbar .form-control {
            border: 2px solid #e9ecef;
            border-radius: 25px 0 0 25px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .navbar .form-control:focus {
            border-color: #000099;
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 153, 0.25);
        }
        
        .navbar .btn-outline-primary {
            border: 2px solid #000099;
            color: #000099;
            border-radius: 0 25px 25px 0;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        
        .navbar .btn-outline-primary:hover {
            background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
            border-color: #000099;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 153, 0.3);
        }
        
        /* Responsive Navbar */
        @media (max-width: 991.98px) {
            .navbar .input-group {
                width: 100%;
                margin: 1rem 0;
            }
            
            .navbar-nav .nav-link {
                margin: 0.25rem 0;
            }
        }
        .content-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            padding: 2rem;
            margin: 2rem 0;
        }
        
        /* Loading Screen Styles */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        
        .loading-screen.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        .loading-content {
            text-align: center;
            color: white;
        }
        
        .loading-logo {
            margin-bottom: 1rem;
            animation: pulse 2s infinite;
        }
        
        .loading-logo img {
            width: 300px;
            height: auto;
            filter: brightness(0) invert(1);
        }
        
        .loading-text {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 2rem;
            letter-spacing: 2px;
        }
        
        .loading-spinner {
            position: relative;
            width: 80px;
            height: 80px;
            margin: 0 auto;
        }
        
        .loading-spinner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        .loading-spinner::after {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            width: calc(100% - 20px);
            height: calc(100% - 20px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-bottom: 2px solid white;
            border-radius: 50%;
            animation: spin 1.5s linear infinite reverse;
        }
        
        .loading-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 2rem;
        }
        
        .loading-dot {
            width: 12px;
            height: 12px;
            background: white;
            border-radius: 50%;
            animation: bounce 1.4s infinite ease-in-out;
        }
        
        .loading-dot:nth-child(1) { animation-delay: -0.32s; }
        .loading-dot:nth-child(2) { animation-delay: -0.16s; }
        .loading-dot:nth-child(3) { animation-delay: 0s; }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        
        @keyframes bounce {
            0%, 80%, 100% {
                transform: scale(0);
                opacity: 0.5;
            }
            40% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        /* Page transition effects */
        .page-content {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .page-content.loaded {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Link hover effect for smooth transitions */
        a:not(.dropdown-toggle):not([data-bs-toggle]):not(.nav-link) {
            transition: all 0.3s ease;
        }
        
        a:not(.dropdown-toggle):not([data-bs-toggle]):not(.nav-link):hover {
            transform: translateY(-2px);
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <img src="{{ asset('images/logo-ls.png') }}" alt="LittleStar Logo">
            </div>
            <div class="loading-text">{{ \App\Models\WebsiteSetting::getValue('loading_text', 'LITTLESTAR STUDIO') }}</div>
            <div class="loading-spinner"></div>
            <div class="loading-dots">
                <div class="loading-dot"></div>
                <div class="loading-dot"></div>
                <div class="loading-dot"></div>
            </div>
        </div>
    </div>
    
    <!-- Page Content -->
    <div class="page-content" id="pageContent">
        @include('layouts.navbar')
        
        <main class="py-4">
            @yield('content')
        </main>
        
        @include('layouts.footer')
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Loading Screen JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadingScreen = document.getElementById('loadingScreen');
            const pageContent = document.getElementById('pageContent');
            
            // Hide loading screen and show content after page loads
            function hideLoading() {
                setTimeout(() => {
                    loadingScreen.classList.add('hidden');
                    pageContent.classList.add('loaded');
                }, 800); // Minimum loading time for better UX
            }
            
            // Show loading screen for navigation
            function showLoading() {
                loadingScreen.classList.remove('hidden');
                pageContent.classList.remove('loaded');
            }
            
            // Handle page load
            if (document.readyState === 'loading') {
                window.addEventListener('load', hideLoading);
            } else {
                hideLoading();
            }
            
            // Handle navigation clicks
            document.addEventListener('click', function(e) {
                const link = e.target.closest('a');
                if (link && 
                    link.href && 
                    !link.href.startsWith('javascript:') &&
                    !link.href.startsWith('#') &&
                    !link.href.includes('mailto:') &&
                    !link.href.includes('tel:') &&
                    !link.target &&
                    !link.download &&
                    link.hostname === window.location.hostname) {
                    
                    // Don't show loading for dropdown toggles or buttons
                    if (link.getAttribute('data-bs-toggle') || 
                        link.classList.contains('dropdown-toggle') ||
                        link.type === 'button') {
                        return;
                    }
                    
                    e.preventDefault();
                    showLoading();
                    
                    // Navigate after a short delay
                    setTimeout(() => {
                        window.location.href = link.href;
                    }, 300);
                }
            });
            
            // Handle form submissions
            document.addEventListener('submit', function(e) {
                const form = e.target;
                if (form.method.toLowerCase() === 'get') {
                    showLoading();
                }
            });
            
            // Handle browser back/forward buttons
            window.addEventListener('pageshow', function(e) {
                if (e.persisted) {
                    hideLoading();
                }
            });
            
            // Handle browser navigation
            window.addEventListener('beforeunload', function() {
                showLoading();
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>