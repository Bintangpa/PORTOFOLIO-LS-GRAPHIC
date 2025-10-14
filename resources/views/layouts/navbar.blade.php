<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" style="height: 75px; margin-left: -8px;">
            @if(\App\Models\WebsiteSetting::getValue('navbar_show_logo', '1') == '1')
                <img src="{{ asset(\App\Models\WebsiteSetting::getValue('navbar_logo', 'images/logo-ls-biru.png')) }}" 
                     alt="{{ \App\Models\WebsiteSetting::getValue('navbar_title', 'LittleStar Studio') }}" 
                     class="me-2" 
                     style="height: {{ \App\Models\WebsiteSetting::getValue('navbar_logo_height', '85') }}px; width: {{ \App\Models\WebsiteSetting::getValue('navbar_logo_width', 'auto') }}; position: relative; z-index: 10;">
            @endif
            @if(\App\Models\WebsiteSetting::getValue('navbar_show_title', '1') == '1')
                {{ \App\Models\WebsiteSetting::getValue('navbar_title', 'LittleStar Studio') }}
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Main Navigation Menu -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home"></i> {{ \App\Models\WebsiteSetting::getValue('navbar_menu_home', 'Beranda') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="{{ route('portfolio') }}">
                        <i class="fas fa-briefcase"></i> {{ \App\Models\WebsiteSetting::getValue('navbar_menu_portfolio', 'Portofolio') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        <i class="fas fa-info-circle"></i> {{ \App\Models\WebsiteSetting::getValue('navbar_menu_about', 'Tentang') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact*') ? 'active' : '' }}" href="{{ route('contact') }}">
                        <i class="fas fa-envelope"></i> {{ \App\Models\WebsiteSetting::getValue('navbar_menu_contact', 'Kontak') }}
                    </a>
                </li>
            </ul>
            
            <!-- Search Form -->
            <form class="d-flex me-3" role="search" action="{{ route('search') }}" method="GET">
                <div class="input-group">
                    <input class="form-control" type="search" name="search" placeholder="{{ \App\Models\WebsiteSetting::getValue('navbar_search_placeholder', 'Cari portofolio...') }}" 
                           value="{{ request('search') }}" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            
            <!-- User Menu -->
            <ul class="navbar-nav">
                @auth
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.portfolios.index') }}">
                                <i class="fas fa-dashboard"></i> {{ \App\Models\WebsiteSetting::getValue('navbar_menu_dashboard', 'Dashboard') }}
                            </a>
                        </li>
                    @endif
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>