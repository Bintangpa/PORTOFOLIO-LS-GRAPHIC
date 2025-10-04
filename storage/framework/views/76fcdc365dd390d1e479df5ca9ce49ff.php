<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', \App\Models\WebsiteSetting::getValue('admin_title', 'Admin Dashboard') . ' - ' . \App\Models\WebsiteSetting::getValue('site_name', 'LittleStar Studio')); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            animation: pulse 15s ease-in-out infinite;
            pointer-events: none;
            z-index: 0;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 20px;
            left: 20px;
            height: calc(100vh - 40px);
            width: 280px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            border-radius: 20px;
            overflow: hidden;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            text-align: center;
            border-bottom: 3px solid rgba(255, 255, 255, 0.2);
            flex-shrink: 0;
            margin: 0;
        }
        
        .sidebar-header h3 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            letter-spacing: 1px;
        }
        
        .sidebar-header small {
            font-size: 0.85rem;
            opacity: 0.9;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        .sidebar-menu {
            padding: 15px 0;
            margin: 0 10px;
            flex: 1;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(30, 58, 138, 0.3) transparent;
        }
        
        .sidebar-menu::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(30, 58, 138, 0.3);
            border-radius: 3px;
        }
        
        .sidebar-menu::-webkit-scrollbar-thumb:hover {
            background: rgba(30, 58, 138, 0.5);
        }
        
        .sidebar-menu .nav-link {
            color: #333;
            padding: 12px 15px;
            margin: 3px 5px;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            font-size: 0.9rem;
        }
        
        .sidebar-menu .nav-link i {
            margin-right: 12px;
            font-size: 1.2rem;
            width: 25px;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .sidebar-menu .nav-link:hover {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(30, 58, 138, 0.4);
        }
        
        .sidebar-menu .nav-link.active {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            box-shadow: 0 5px 20px rgba(30, 58, 138, 0.5);
            font-weight: 600;
        }
        
        .sidebar-menu .nav-link.active i {
            animation: bounce 0.5s ease;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .sidebar-footer {
            padding: 15px 20px;
            margin: 0 10px 10px 10px;
            border-top: 2px solid #f0f0f0;
            background: rgba(248, 249, 250, 0.8);
            border-radius: 15px;
            margin-top: auto;
            flex-shrink: 0;
        }
        
        .logout-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.4);
        }
        
        .logout-btn i {
            margin-right: 8px;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 320px;
            padding: 20px 30px 30px 20px;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }
        
        /* Top Bar */
        .top-bar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .top-bar h2 {
            margin: 0;
            font-weight: 700;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            box-shadow: 0 5px 15px rgba(30, 58, 138, 0.3);
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            font-weight: 700;
            padding: 20px 25px;
            border: none;
            font-size: 1.1rem;
        }
        
        .card-body {
            padding: 25px;
        }
        
        /* Stats Cards */
        .stats-card {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(30, 58, 138, 0.3);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .stats-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .stats-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(30, 58, 138, 0.4);
        }
        
        .stats-card h3 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }
        
        .stats-card p {
            margin: 0;
            font-size: 1.1rem;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            letter-spacing: 1px;
        }
        
        .stats-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 5rem;
            opacity: 0.15;
            z-index: 0;
        }
        
        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(30, 58, 138, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(30, 58, 138, 0.5);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: none;
            color: white;
            padding: 8px 20px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.4);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            border: none;
            color: white;
            padding: 8px 20px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.4);
        }
        
        .btn-info {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            border: none;
            color: white;
            padding: 8px 20px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30, 58, 138, 0.4);
        }
        
        /* Table Styles */
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            border: none;
            font-weight: 600;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }
        
        .table tbody tr {
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background: linear-gradient(90deg, rgba(30, 58, 138, 0.05) 0%, rgba(30, 64, 175, 0.05) 100%);
            transform: scale(1.01);
        }
        
        .table tbody td {
            vertical-align: middle;
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        /* Alert Styles */
        .alert {
            border-radius: 15px;
            border: none;
            padding: 15px 20px;
            font-weight: 500;
            animation: slideDown 0.5s ease;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-success {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
        }
        
        /* Form Styles */
        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                top: 0;
                left: 0;
                height: 100vh;
                transform: translateX(-100%);
                border-radius: 0;
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.3);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 80px 20px 20px 20px;
            }
            
            .mobile-menu-toggle {
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 1001;
                background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
                color: white;
                border: none;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.2rem;
                box-shadow: 0 5px 15px rgba(30, 58, 138, 0.4);
                transition: all 0.3s ease;
            }
            
            .mobile-menu-toggle:hover {
                transform: scale(1.1);
                box-shadow: 0 8px 25px rgba(30, 58, 138, 0.6);
            }
        }
        
        @media (min-width: 769px) {
            .mobile-menu-toggle {
                display: none;
            }
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
            animation: pulse-admin 2s infinite;
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
            animation: spin-admin 1s linear infinite;
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
            animation: spin-admin 1.5s linear infinite reverse;
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
            animation: bounce-admin 1.4s infinite ease-in-out;
        }
        
        .loading-dot:nth-child(1) { animation-delay: -0.32s; }
        .loading-dot:nth-child(2) { animation-delay: -0.16s; }
        .loading-dot:nth-child(3) { animation-delay: 0s; }
        
        @keyframes spin-admin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes pulse-admin {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        
        @keyframes bounce-admin {
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
        .admin-content {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .admin-content.loaded {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin-admin 1s ease-in-out infinite;
        }
    </style>
    
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <img src="<?php echo e(asset('images/logo-ls.png')); ?>" alt="LittleStar Logo">
            </div>
            <div class="loading-text">ADMIN DASHBOARD</div>
            <div class="loading-spinner"></div>
            <div class="loading-dots">
                <div class="loading-dot"></div>
                <div class="loading-dot"></div>
                <div class="loading-dot"></div>
            </div>
        </div>
    </div>
    
    <!-- Admin Content -->
    <div class="admin-content" id="adminContent">
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" id="mobileMenuToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-star"></i> <?php echo e(\App\Models\WebsiteSetting::getValue('admin_brand', 'LITTLESTAR')); ?></h3>
            <small>Admin Dashboard</small>
        </div>
        
        <div class="sidebar-menu">
            <nav class="nav flex-column">
                <a class="nav-link <?php echo e(request()->routeIs('admin.portfolios.index') ? 'active' : ''); ?>" href="<?php echo e(route('admin.portfolios.index')); ?>">
                    <i class="fas fa-list"></i> Kelola Portofolio
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.portfolios.create') ? 'active' : ''); ?>" href="<?php echo e(route('admin.portfolios.create')); ?>">
                    <i class="fas fa-plus-circle"></i> Tambah Portofolio
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.contact.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.contact.index')); ?>">
                    <i class="fas fa-address-book"></i> Kontak Control
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.website.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.website.index')); ?>">
                    <i class="fas fa-cogs"></i> Website Settings
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.about.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.about.index')); ?>">
                    <i class="fas fa-info-circle"></i> Kelola Halaman Tentang
                </a>
                <a class="nav-link" href="<?php echo e(route('home')); ?>" target="_blank">
                    <i class="fas fa-globe"></i> Preview Website
                </a>
            </nav>
        </div>
        
        <div class="sidebar-footer">
            <div class="user-info mb-3">
                <div class="user-avatar">
                    <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                </div>
                <div>
                    <div style="font-weight: 600; color: #333;"><?php echo e(auth()->user()->name); ?></div>
                    <small style="color: #999;">Administrator</small>
                </div>
            </div>
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h2><i class="fas fa-chart-line"></i> <?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h2>
            <div class="user-info">
                <span style="color: #666;"><?php echo e(now()->format('l, d F Y')); ?></span>
            </div>
        </div>
        
        <!-- Alerts -->
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> <?php echo e(session('error')); ?>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
            <!-- Page Content -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Loading Screen JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadingScreen = document.getElementById('loadingScreen');
            const adminContent = document.getElementById('adminContent');
            
            // Hide loading screen and show content after page loads
            function hideLoading() {
                setTimeout(() => {
                    loadingScreen.classList.add('hidden');
                    adminContent.classList.add('loaded');
                }, 800); // Minimum loading time for better UX
            }
            
            // Show loading screen for navigation
            function showLoading() {
                loadingScreen.classList.remove('hidden');
                adminContent.classList.remove('loaded');
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
                        link.type === 'button' ||
                        link.classList.contains('btn-close')) {
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
            
            // Mobile menu toggle functionality
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const sidebar = document.getElementById('sidebar');
            
            if (mobileMenuToggle && sidebar) {
                mobileMenuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                    
                    // Change icon
                    const icon = mobileMenuToggle.querySelector('i');
                    if (sidebar.classList.contains('active')) {
                        icon.className = 'fas fa-times';
                    } else {
                        icon.className = 'fas fa-bars';
                    }
                });
                
                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        if (!sidebar.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                            sidebar.classList.remove('active');
                            mobileMenuToggle.querySelector('i').className = 'fas fa-bars';
                        }
                    }
                });
                
                // Close sidebar on window resize to desktop
                window.addEventListener('resize', function() {
                    if (window.innerWidth > 768) {
                        sidebar.classList.remove('active');
                        mobileMenuToggle.querySelector('i').className = 'fas fa-bars';
                    }
                });
            }
        });
    </script>
    
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/layouts/admin.blade.php ENDPATH**/ ?>