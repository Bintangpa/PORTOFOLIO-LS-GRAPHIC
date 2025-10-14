<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo e(route('home')); ?>" style="height: 75px; margin-left: -8px;">
            <?php if(\App\Models\WebsiteSetting::getValue('navbar_show_logo', '1') == '1'): ?>
                <img src="<?php echo e(asset(\App\Models\WebsiteSetting::getValue('navbar_logo', 'images/logo-ls-biru.png'))); ?>" 
                     alt="<?php echo e(\App\Models\WebsiteSetting::getValue('navbar_title', 'LittleStar Studio')); ?>" 
                     class="me-2" 
                     style="height: <?php echo e(\App\Models\WebsiteSetting::getValue('navbar_logo_height', '85')); ?>px; width: <?php echo e(\App\Models\WebsiteSetting::getValue('navbar_logo_width', 'auto')); ?>; position: relative; z-index: 10;">
            <?php endif; ?>
            <?php if(\App\Models\WebsiteSetting::getValue('navbar_show_title', '1') == '1'): ?>
                <?php echo e(\App\Models\WebsiteSetting::getValue('navbar_title', 'LittleStar Studio')); ?>

            <?php endif; ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Main Navigation Menu -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">
                        <i class="fas fa-home"></i> <?php echo e(\App\Models\WebsiteSetting::getValue('navbar_menu_home', 'Beranda')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('portfolio') ? 'active' : ''); ?>" href="<?php echo e(route('portfolio')); ?>">
                        <i class="fas fa-briefcase"></i> <?php echo e(\App\Models\WebsiteSetting::getValue('navbar_menu_portfolio', 'Portofolio')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>" href="<?php echo e(route('about')); ?>">
                        <i class="fas fa-info-circle"></i> <?php echo e(\App\Models\WebsiteSetting::getValue('navbar_menu_about', 'Tentang')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('contact*') ? 'active' : ''); ?>" href="<?php echo e(route('contact')); ?>">
                        <i class="fas fa-envelope"></i> <?php echo e(\App\Models\WebsiteSetting::getValue('navbar_menu_contact', 'Kontak')); ?>

                    </a>
                </li>
            </ul>
            
            <!-- Search Form -->
            <form class="d-flex me-3" role="search" action="<?php echo e(route('search')); ?>" method="GET">
                <div class="input-group">
                    <input class="form-control" type="search" name="search" placeholder="<?php echo e(\App\Models\WebsiteSetting::getValue('navbar_search_placeholder', 'Cari portofolio...')); ?>" 
                           value="<?php echo e(request('search')); ?>" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            
            <!-- User Menu -->
            <ul class="navbar-nav">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('admin.portfolios.index')); ?>">
                                <i class="fas fa-dashboard"></i> <?php echo e(\App\Models\WebsiteSetting::getValue('navbar_menu_dashboard', 'Dashboard')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i> <?php echo e(auth()->user()->name); ?>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>