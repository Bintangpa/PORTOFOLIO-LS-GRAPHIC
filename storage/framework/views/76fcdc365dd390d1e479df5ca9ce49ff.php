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
            height: 100vh;
            overflow: hidden;
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
            position: fixed !important;
            top: 20px !important;
            left: 20px !important;
            bottom: 20px !important;
            width: 280px !important;
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(20px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 0;
            z-index: 99999 !important;
            display: flex;
            flex-direction: column;
            border-radius: 20px !important;
            overflow: hidden;
            transform: none !important;
            transition: transform 0.3s ease, width 0.3s ease;
        }
        
        .sidebar.collapsed {
            transform: translateX(-260px) !important;
            width: 60px !important;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            text-align: center;
            border-bottom: 3px solid rgba(255, 255, 255, 0.2);
            flex-shrink: 0;
            margin: 0;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
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
            text-decoration: none;
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
            padding: 15px 20px 20px 20px;
            margin: 0;
            border-top: 2px solid #f0f0f0;
            background: rgba(248, 249, 250, 0.8);
            border-bottom-left-radius: 20px !important;
            border-bottom-right-radius: 20px !important;
            margin-top: auto;
            flex-shrink: 0;
        }
        
        /* Force proper border radius on all sidebar elements */
        .sidebar * {
            box-sizing: border-box;
        }
        
        .sidebar::before,
        .sidebar::after {
            display: none;
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
            padding: 110px 30px 30px 20px;
            height: 100vh;
            position: relative;
            z-index: 1;
            overflow-y: auto;
            box-sizing: border-box;
            transition: margin-left 0.3s ease;
        }
        
        .main-content.sidebar-collapsed {
            margin-left: 80px;
        }
        
        /* Top Bar */
        .top-bar {
            position: fixed;
            top: 20px;
            left: 320px;
            right: 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 20px 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            transition: left 0.3s ease;
        }
        
        .top-bar.sidebar-collapsed {
            left: 80px;
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
        
        /* Notification Styles */
        .notification-dropdown {
            position: relative;
        }
        
        .notification-bell {
            background: rgba(30, 58, 138, 0.1);
            border: 1px solid rgba(30, 58, 138, 0.3);
            color: #1e3a8a;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .notification-bell:hover {
            background: #1e3a8a;
            color: white;
            transform: scale(1.05);
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #dc2626;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            animation: pulse-notification 2s infinite;
        }
        
        @keyframes pulse-notification {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .notification-dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            width: 350px;
            max-height: 400px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
            margin-top: 10px;
            border: 1px solid #e2e8f0;
        }
        
        .notification-dropdown-menu.show {
            display: block;
            animation: slideDown 0.3s ease;
        }
        
        .notification-header {
            padding: 15px 20px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .notification-header h6 {
            margin: 0;
            font-weight: 600;
            color: #1e293b;
        }
        
        .mark-all-read {
            background: none;
            border: none;
            color: #1e3a8a;
            font-size: 0.8rem;
            cursor: pointer;
            text-decoration: underline;
        }
        
        .notification-item {
            padding: 15px 20px;
            border-bottom: 1px solid #f1f5f9;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .notification-item:hover {
            background: #f8fafc;
        }
        
        .notification-item.unread {
            background: rgba(30, 58, 138, 0.05);
            border-left: 3px solid #1e3a8a;
        }
        
        .notification-item.unread::before {
            content: '';
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            background: #1e3a8a;
            border-radius: 50%;
        }
        
        .notification-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            margin-right: 12px;
            flex-shrink: 0;
        }
        
        .notification-content {
            flex: 1;
        }
        
        .notification-title {
            font-weight: 600;
            color: #1e293b;
            font-size: 0.9rem;
            margin-bottom: 2px;
        }
        
        .notification-message {
            color: #6b7280;
            font-size: 0.8rem;
            margin-bottom: 4px;
        }
        
        .notification-time {
            color: #9ca3af;
            font-size: 0.7rem;
        }
        
        .notification-empty {
            padding: 40px 20px;
            text-align: center;
            color: #6b7280;
        }
        
        .notification-empty i {
            font-size: 2rem;
            margin-bottom: 10px;
            opacity: 0.5;
        }
        
        /* Mobile Menu Toggle in Top Bar */
        .mobile-menu-toggle-topbar {
            background: rgba(30, 58, 138, 0.1);
            border: 1px solid rgba(30, 58, 138, 0.3);
            color: #1e3a8a;
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            margin-left: 10px;
        }
        
        .mobile-menu-toggle-topbar:hover {
            background: #1e3a8a;
            color: white;
            transform: scale(1.05);
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
        @media (max-width: 1200px) {
            .sidebar {
                top: 0 !important;
                left: 0 !important;
                bottom: 0 !important;
                width: 280px !important;
                transform: translateX(-100%);
                border-radius: 0;
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.3);
                transition: transform 0.3s ease;
                z-index: 100000 !important;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 110px 20px 20px 20px;
            }
            
            .top-bar {
                left: 20px;
                right: 20px;
            }
        }
        
        @media (max-width: 1024px) {
            .sidebar {
                width: 260px !important;
            }
            
            .main-content {
                padding: 70px 15px 15px 15px;
            }
        }
        
        @media (max-width: 768px) {
            body {
                overflow-x: hidden;
                overflow-y: auto;
                height: auto;
            }
            
            .main-content {
                height: auto;
                min-height: 100vh;
                overflow-y: visible;
            }
            
            .sidebar {
                width: 100% !important;
                max-width: 320px;
            }
            
            .sidebar-header {
                padding: 20px;
            }
            
            .sidebar-header h3 {
                font-size: 1.5rem;
            }
            
            .sidebar-menu {
                padding: 10px 0;
                margin: 0 5px;
            }
            
            .sidebar-menu .nav-link {
                padding: 15px 20px;
                font-size: 1rem;
            }
            
            .sidebar-footer {
                padding: 15px;
                margin: 0 5px 5px 5px;
            }
            
            .mobile-menu-toggle {
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 100003;
                background: rgba(255, 255, 255, 0.95);
                border: 2px solid #1e3a8a;
                color: #1e3a8a;
                width: 50px;
                height: 50px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.2rem;
                cursor: pointer;
                transition: all 0.3s ease;
                font-weight: 600;
                backdrop-filter: blur(10px);
                box-shadow: 0 4px 15px rgba(30, 58, 138, 0.2);
            }
            
            .mobile-menu-toggle:hover {
                background: #1e3a8a;
                color: white;
                transform: scale(1.05);
                box-shadow: 0 6px 20px rgba(30, 58, 138, 0.4);
            }
        }
        
        /* Hide original mobile menu toggle */
        .mobile-menu-toggle {
            display: none !important;
        }
        
        @media (max-width: 1200px) {
            .mobile-menu-toggle-topbar {
                display: flex;
            }
        }
        
        @media (min-width: 1201px) {
            .mobile-menu-toggle-topbar {
                display: none;
            }
        }
        
        /* Sidebar Toggle Button */
        .sidebar-toggle {
            position: fixed;
            top: 60%;
            left: 310px;
            transform: translateY(-50%);
            z-index: 100001;
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid #1e3a8a;
            color: #1e3a8a;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(30, 58, 138, 0.2);
        }
        
        .sidebar-toggle.moving-left {
            left: 80px;
            top: 60%;
            transform: translateY(-50%);
        }
        
        .sidebar-toggle:hover {
            background: #1e3a8a;
            color: white;
            border-color: #1e3a8a;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 6px 20px rgba(30, 58, 138, 0.4);
        }
        
        .sidebar-toggle i {
            transition: all 0.3s ease;
            filter: drop-shadow(0 0 2px rgba(0, 0, 0, 0.3));
        }
        
        .sidebar-toggle:hover i {
            filter: drop-shadow(0 0 6px rgba(30, 58, 138, 0.8));
        }
        
        .sidebar.collapsed .sidebar-toggle {
            left: 80px;
            top: 60%;
            background: #dc2626;
            border: 2px solid #b91c1c;
            color: white;
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.6);
            z-index: 100002;
            animation: pulse-attention 2s infinite;
            transform: translateY(-50%);
        }
        
        /* Remove animation when sidebar is restored */
        .sidebar:not(.collapsed) .sidebar-toggle {
            animation: none;
        }
        
        @keyframes pulse-attention {
            0%, 100% {
                box-shadow: 0 6px 20px rgba(220, 38, 38, 0.6);
            }
            50% {
                box-shadow: 0 8px 30px rgba(220, 38, 38, 0.8);
            }
        }
        
        .sidebar.collapsed .sidebar-toggle:hover {
            background: rgba(239, 68, 68, 0.95);
            border-color: #ef4444;
            transform: translateY(-50%) scale(1.15);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.7);
        }
        
        .sidebar.collapsed .sidebar-toggle i {
            filter: drop-shadow(0 0 4px rgba(0, 0, 0, 0.6));
        }
        
        .sidebar.collapsed .sidebar-toggle:hover i {
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.9));
        }
        
        /* Ensure button is always visible */
        .sidebar-toggle {
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .sidebar.collapsed + .sidebar-toggle {
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        @media (max-width: 1200px) {
            .sidebar-toggle {
                display: none;
            }
        }
        
        /* Sidebar Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 99998;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        
        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        @media (min-width: 1201px) {
            .sidebar-overlay {
                display: none;
            }
        }
        
        /* Admin Dashboard - No Loading Screens */
        /* Loading removed from admin dashboard as requested */
        
        /* Admin content shows immediately without transitions */
        .admin-content {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    <!-- No loading screens for admin dashboard -->
    
    <!-- Admin Content -->
    <div class="admin-content" id="adminContent">
        <!-- Sidebar Overlay -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>
        
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" id="mobileMenuToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Sidebar Toggle Button -->
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-chevron-left"></i>
        </button>
        
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar" style="position: fixed !important; top: 20px !important; left: 20px !important; z-index: 99999 !important;">
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
                <a class="nav-link <?php echo e(request()->routeIs('admin.navbar.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.navbar.index')); ?>">
                    <i class="fas fa-bars"></i> Navbar Control
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.portfolio-page.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.portfolio-page.index')); ?>">
                    <i class="fas fa-briefcase"></i> Portfolio Page Control
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.about.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.about.index')); ?>">
                    <i class="fas fa-info-circle"></i> Kelola Halaman Tentang
                </a>
                <a class="nav-link <?php echo e(request()->routeIs('admin.account.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.account.index')); ?>">
                    <i class="fas fa-user-cog"></i> Pengaturan Akun
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
                <!-- Notification Dropdown -->
                <div class="notification-dropdown">
                    <div class="notification-bell" id="notificationBell">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge" id="notificationBadge" style="display: none;">0</span>
                    </div>
                    <div class="notification-dropdown-menu" id="notificationDropdown">
                        <div class="notification-header">
                            <h6>Notifikasi</h6>
                            <button class="mark-all-read" id="markAllRead">Tandai Semua Dibaca</button>
                        </div>
                        <div id="notificationList">
                            <div class="notification-empty">
                                <i class="fas fa-bell-slash"></i>
                                <p>Tidak ada notifikasi</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <span style="color: #666;"><?php echo e(now()->format('l, d F Y')); ?></span>
                <!-- Mobile Menu Toggle in Top Bar -->
                <button class="mobile-menu-toggle-topbar" id="mobileMenuToggleTopbar">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        
        <!-- Alerts removed - notifications now handled by notification system -->
        
            <!-- Page Content -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Universal Admin Loading Animation Script -->
    <script src="<?php echo e(asset('js/admin-loading.js')); ?>"></script>
    
    <!-- Admin Dashboard JavaScript - No Loading -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Admin dashboard loads instantly without loading screens
            
            // Sidebar toggle functionality
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            
            if (sidebarToggle && sidebar && mainContent) {
                sidebarToggle.addEventListener('click', function() {
                    // Add moving class first for smooth transition
                    if (!sidebar.classList.contains('collapsed')) {
                        sidebarToggle.classList.add('moving-left');
                    }
                    
                    // Small delay to allow position transition
                    setTimeout(() => {
                        sidebar.classList.toggle('collapsed');
                        mainContent.classList.toggle('sidebar-collapsed');
                        
                        // Toggle top bar position
                        const topBar = document.querySelector('.top-bar');
                        if (topBar) {
                            topBar.classList.toggle('sidebar-collapsed');
                        }
                        
                        // Remove moving class when sidebar is shown again
                        if (!sidebar.classList.contains('collapsed')) {
                            sidebarToggle.classList.remove('moving-left');
                        }
                        
                        // Ensure button remains visible
                        sidebarToggle.style.display = 'flex';
                        sidebarToggle.style.visibility = 'visible';
                        sidebarToggle.style.opacity = '1';
                        
                        // Change icon
                        const icon = sidebarToggle.querySelector('i');
                        if (sidebar.classList.contains('collapsed')) {
                            icon.className = 'fas fa-chevron-right';
                        } else {
                            icon.className = 'fas fa-chevron-left';
                        }
                    }, 50);
                });
            }
            
            // Mobile menu toggle functionality
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const mobileMenuToggleTopbar = document.getElementById('mobileMenuToggleTopbar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            
            if ((mobileMenuToggle || mobileMenuToggleTopbar) && sidebar && sidebarOverlay) {
                function toggleSidebar() {
                    sidebar.classList.toggle('active');
                    sidebarOverlay.classList.toggle('active');
                    
                    // Change icon for both toggles
                    const activeToggle = mobileMenuToggleTopbar || mobileMenuToggle;
                    const icon = activeToggle.querySelector('i');
                    if (sidebar.classList.contains('active')) {
                        icon.className = 'fas fa-times';
                        document.body.style.overflow = 'hidden';
                    } else {
                        icon.className = 'fas fa-bars';
                        document.body.style.overflow = '';
                    }
                }
                
                function closeSidebar() {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    const activeToggle = mobileMenuToggleTopbar || mobileMenuToggle;
                    if (activeToggle) {
                        activeToggle.querySelector('i').className = 'fas fa-bars';
                    }
                    document.body.style.overflow = '';
                }
                
                if (mobileMenuToggle) {
                    mobileMenuToggle.addEventListener('click', toggleSidebar);
                }
                if (mobileMenuToggleTopbar) {
                    mobileMenuToggleTopbar.addEventListener('click', toggleSidebar);
                }
                
                // Close sidebar when clicking overlay
                sidebarOverlay.addEventListener('click', closeSidebar);
                
                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', function(e) {
                    if (window.innerWidth <= 1200) {
                        const clickedToggle = (mobileMenuToggle && mobileMenuToggle.contains(e.target)) || 
                                             (mobileMenuToggleTopbar && mobileMenuToggleTopbar.contains(e.target));
                        if (!sidebar.contains(e.target) && !clickedToggle) {
                            closeSidebar();
                        }
                    }
                });
                
                // Close sidebar on window resize to desktop
                window.addEventListener('resize', function() {
                    if (window.innerWidth > 1200) {
                        closeSidebar();
                    }
                });
            }
            
            // Initialize notifications
            initializeNotifications();
        });
        
        // Notification System
        function initializeNotifications() {
            const notificationBell = document.getElementById('notificationBell');
            const notificationDropdown = document.getElementById('notificationDropdown');
            const notificationBadge = document.getElementById('notificationBadge');
            const notificationList = document.getElementById('notificationList');
            const markAllRead = document.getElementById('markAllRead');
            
            // Load notifications on page load
            loadNotifications();
            
            // Refresh notifications every 30 seconds
            setInterval(loadNotifications, 30000);
            
            // Toggle notification dropdown
            notificationBell.addEventListener('click', function(e) {
                e.stopPropagation();
                notificationDropdown.classList.toggle('show');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!notificationDropdown.contains(e.target) && !notificationBell.contains(e.target)) {
                    notificationDropdown.classList.remove('show');
                }
            });
            
            // Mark all as read
            markAllRead.addEventListener('click', function() {
                fetch('/admin/notifications/mark-all-read', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateNotificationBadge(0);
                        loadNotifications();
                    }
                })
                .catch(error => console.error('Error:', error));
            });
            
            function loadNotifications() {
                fetch('/admin/notifications/recent')
                .then(response => response.json())
                .then(data => {
                    updateNotificationBadge(data.unread_count);
                    renderNotifications(data.notifications);
                })
                .catch(error => console.error('Error loading notifications:', error));
            }
            
            function updateNotificationBadge(count) {
                if (count > 0) {
                    notificationBadge.textContent = count > 99 ? '99+' : count;
                    notificationBadge.style.display = 'flex';
                } else {
                    notificationBadge.style.display = 'none';
                }
            }
            
            function renderNotifications(notifications) {
                if (notifications.length === 0) {
                    notificationList.innerHTML = `
                        <div class="notification-empty">
                            <i class="fas fa-bell-slash"></i>
                            <p>Tidak ada notifikasi</p>
                        </div>
                    `;
                    return;
                }
                
                notificationList.innerHTML = notifications.map(notification => {
                    const iconColors = {
                        'portfolio': 'background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%); color: white;',
                        'navbar': 'background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%); color: white;',
                        'website': 'background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white;',
                        'contact': 'background: linear-gradient(135deg, #059669 0%, #047857 100%); color: white;',
                        'about': 'background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%); color: white;',
                        'account': 'background: linear-gradient(135deg, #374151 0%, #1f2937 100%); color: white;',
                        'system': 'background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); color: white;'
                    };
                    
                    return `
                        <div class="notification-item d-flex align-items-start ${!notification.is_read ? 'unread' : ''}" 
                             onclick="markAsRead(${notification.id})">
                            <div class="notification-icon" style="${iconColors[notification.type] || iconColors.system}">
                                <i class="${notification.icon}"></i>
                            </div>
                            <div class="notification-content">
                                <div class="notification-title">${notification.title}</div>
                                <div class="notification-message">${notification.message}</div>
                                <div class="notification-time">${formatTimeAgo(notification.created_at)}</div>
                            </div>
                        </div>
                    `;
                }).join('');
            }
            
            function formatTimeAgo(dateString) {
                const date = new Date(dateString);
                const now = new Date();
                const diffInSeconds = Math.floor((now - date) / 1000);
                
                if (diffInSeconds < 60) return 'Baru saja';
                if (diffInSeconds < 3600) return Math.floor(diffInSeconds / 60) + ' menit yang lalu';
                if (diffInSeconds < 86400) return Math.floor(diffInSeconds / 3600) + ' jam yang lalu';
                if (diffInSeconds < 2592000) return Math.floor(diffInSeconds / 86400) + ' hari yang lalu';
                return date.toLocaleDateString('id-ID');
            }
            
            // Global function for marking notifications as read
            window.markAsRead = function(notificationId) {
                fetch(`/admin/notifications/${notificationId}/mark-read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateNotificationBadge(data.unread_count);
                        loadNotifications();
                    }
                })
                .catch(error => console.error('Error:', error));
            };
        }
    </script>
    
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/layouts/admin.blade.php ENDPATH**/ ?>