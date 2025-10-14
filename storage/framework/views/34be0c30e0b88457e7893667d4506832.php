<?php $__env->startSection('title', \App\Models\WebsiteSetting::getValue('portfolio_title', 'Portofolio') . ' - ' . \App\Models\WebsiteSetting::getValue('site_name', 'LittleStar Studio')); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .page-header {
        text-align: center;
        color: white;
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
    }
    
    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23ffffff" opacity="0.1"><polygon points="1000,100 1000,0 0,100"/></svg>') no-repeat bottom;
        background-size: cover;
    }
    
    .page-header-content {
        position: relative;
        z-index: 2;
    }
    
    .page-header h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        background: linear-gradient(45deg, #ffffff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: fadeInUp 1s ease-out;
    }
    
    .page-header .lead {
        font-size: 1.2rem;
        margin-bottom: 0;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        animation: fadeInUp 1s ease-out 0.2s both;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .portfolio-card {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        background: white;
        margin-bottom: 30px;
    }
    
    .portfolio-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    
    .portfolio-image-container {
        position: relative;
        width: 100%;
        aspect-ratio: 4/3;
        overflow: hidden;
    }
    
    .portfolio-card img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }
    
    .portfolio-card:hover img {
        transform: scale(1.1);
    }
    
    .portfolio-card-body {
        padding: 20px;
    }
    
    .portfolio-card-body h5 {
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .portfolio-card-body p {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 15px;
    }
    
    .portfolio-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
    }
    
    .category-tag, .client-tag {
        display: inline-flex;
        align-items: center;
        padding: 4px 10px;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 500;
        text-decoration: none;
    }
    
    .category-tag {
        background: linear-gradient(135deg, #e0f2fe 0%, #b3e5fc 100%);
        color: #0277bd;
        border: 1px solid #81d4fa;
    }
    
    .client-tag {
        background: linear-gradient(135deg, #f3e5f5 0%, #e1bee7 100%);
        color: #7b1fa2;
        border: 1px solid #ce93d8;
    }
    
    .badge-category {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 25px;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(0, 0, 153, 0.3);
        z-index: 3;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
    }
    
    .portfolio-card:hover .badge-category {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 0, 153, 0.4);
    }
    
    .search-section {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        padding: 2rem;
        margin-bottom: 2rem;
    }
    
    .search-form {
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .search-input {
        flex: 1;
        min-width: 250px;
    }
    
    .search-input .form-control {
        border: 2px solid #e9ecef;
        border-radius: 25px;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .search-input .form-control:focus {
        border-color: #000099;
        box-shadow: 0 0 0 0.2rem rgba(0, 0, 153, 0.25);
    }
    
    .search-btn {
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        border: none;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .search-btn:hover {
        background: linear-gradient(135deg, #0000cc 0%, #0000ff 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 153, 0.3);
        color: white;
    }
    
    .category-filter-btn {
        display: inline-block;
        padding: 6px 16px;
        background: #f8f9fa;
        color: #6c757d;
        text-decoration: none;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }
    
    .category-filter-btn:hover {
        background: #e9ecef;
        color: #495057;
        text-decoration: none;
        transform: translateY(-1px);
    }
    
    .category-filter-btn.active {
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        color: white;
        border-color: #000099;
        box-shadow: 0 4px 15px rgba(0, 0, 153, 0.3);
    }
    
    .category-filter-btn.active:hover {
        background: linear-gradient(135deg, #0000cc 0%, #000099 100%);
        color: white;
    }
    
    .portfolio-grid {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        padding: 2rem;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 40px;
    }
    
    .empty-state i {
        color: #cbd5e1;
        margin-bottom: 20px;
    }
    
    .empty-state h4 {
        color: #64748b;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .empty-state p {
        color: #94a3b8;
        margin-bottom: 0;
    }
    
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }
    
    /* Custom Pagination Styles */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    
    .pagination .page-item {
        margin: 0;
    }
    
    .pagination .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border: 2px solid #000099;
        border-radius: 50%;
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
    }
    
    .pagination .page-link:hover {
        background: linear-gradient(135deg, #0000cc 0%, #000099 100%);
        border-color: #0000cc;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 153, 0.4);
    }
    
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        border: 3px solid #ff6b35;
        color: white;
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.6), 0 0 0 3px rgba(255, 107, 53, 0.2);
        transform: scale(1.15);
        font-weight: 800;
        position: relative;
        z-index: 10;
    }
    
    .pagination .page-item.active .page-link::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, #ff6b35, #f7931e, #ff6b35);
        border-radius: 50%;
        z-index: -1;
        animation: activePagePulse 2s ease-in-out infinite;
    }
    
    @keyframes activePagePulse {
        0%, 100% {
            opacity: 0.7;
            transform: scale(1);
        }
        50% {
            opacity: 1;
            transform: scale(1.05);
        }
    }
    
    /* Prevent hover effects on active page */
    .pagination .page-item.active .page-link:hover {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        border: 3px solid #ff6b35;
        color: white;
        transform: scale(1.15);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.6), 0 0 0 3px rgba(255, 107, 53, 0.2);
    }
    
    .pagination .page-item.disabled .page-link {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        border-color: #6c757d;
        color: rgba(255, 255, 255, 0.6);
        cursor: not-allowed;
        opacity: 0.6;
    }
    
    .pagination .page-item.disabled .page-link:hover {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        border-color: #6c757d;
        color: rgba(255, 255, 255, 0.6);
        transform: none;
        box-shadow: none;
        opacity: 0.6;
    }
    
    /* Previous/Next buttons - target by content */
    .pagination .page-link:has(i.fa-chevron-left),
    .pagination .page-link:has(i.fa-chevron-right),
    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        width: auto;
        min-width: 120px;
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        height: auto;
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        border-color: #000099;
        color: white;
    }
    
    .pagination .page-item:first-child .page-link:hover,
    .pagination .page-item:last-child .page-link:hover {
        background: linear-gradient(135deg, #0000cc 0%, #000099 100%);
        border-color: #0000cc;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 153, 0.4);
    }
    
    /* Remove auto-generated icons since we're using custom pagination */
    
    /* Improve pagination container */
    .pagination-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 20px;
        margin-top: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    /* Pagination info */
    .pagination-info {
        text-align: center;
        margin-top: 1rem;
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    /* Social Media Section */
    .social-media-section {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 60px 0;
        margin-top: 40px;
        position: relative;
        overflow: hidden;
    }
    
    .social-media-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23ffffff" opacity="0.05"><polygon points="1000,100 1000,0 0,100"/></svg>') no-repeat bottom;
        background-size: cover;
    }
    
    .social-media-container {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .social-header h3 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 15px;
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        animation: fadeInUp 1s ease-out;
    }
    
    .social-header .lead {
        font-size: 1.1rem;
        color: #64748b;
        margin-bottom: 0;
    }
    
    .social-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 25px;
        margin-top: 30px;
        animation: fadeInUp 1s ease-out 0.3s both;
    }
    
    .social-icon-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        text-decoration: none;
        color: white;
        font-size: 1.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        position: relative;
        overflow: hidden;
        border: 3px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
    }
    
    .social-icon-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }
    
    .social-icon-link:hover::before {
        left: 100%;
    }
    
    .social-icon-link:hover {
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 12px 30px rgba(0,0,0,0.25);
        color: white;
        text-decoration: none;
        border-color: rgba(255, 255, 255, 0.4);
    }
    
    .social-icon-link i {
        font-size: 1.8rem;
        transition: all 0.3s ease;
    }
    
    .social-icon-link:hover i {
        transform: scale(1.2);
    }
    
    /* Tooltip styling */
    .social-icon-link {
        position: relative;
    }
    
    .social-icon-link::after {
        content: attr(title);
        position: absolute;
        bottom: -35px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.8rem;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        pointer-events: none;
        z-index: 1000;
    }
    
    .social-icon-link:hover::after {
        opacity: 1;
        visibility: visible;
        bottom: -40px;
    }
    
    .social-instagram {
        background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
    }
    
    .social-tiktok {
        background: linear-gradient(135deg, #000000 0%, #333333 100%);
    }
    
    .social-whatsapp {
        background: linear-gradient(135deg, #25d366 0%, #1ebe57 100%);
    }
    
    .social-email {
        background: linear-gradient(135deg, #ea4335 0%, #d33b2c 100%);
    }
    
    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }
        
        .social-media-section {
            padding: 40px 0;
            margin-top: 30px;
        }
        
        .social-media-container {
            padding: 30px 20px;
            margin: 0 20px;
        }
        
        .social-header h3 {
            font-size: 2rem;
        }
        
        .social-links {
            gap: 20px;
        }
        
        .social-icon-link {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }
        
        .social-icon-link i {
            font-size: 1.5rem;
        }
        
        .social-icon-link:hover i {
            transform: scale(1.1);
        }
        
        .search-form {
            flex-direction: column;
        }
        
        .search-input {
            width: 100%;
            min-width: auto;
        }
        
        .search-btn {
            width: 100%;
        }
        
        .category-filter-btn {
            font-size: 0.8rem;
            padding: 5px 12px;
        }
        
        .portfolio-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 6px;
        }
        
        .badge-category {
            top: 10px;
            right: 10px;
            padding: 6px 12px;
            font-size: 0.7rem;
        }
        
        /* Mobile pagination adjustments */
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            min-width: 80px;
            padding: 0 15px;
            font-size: 0.8rem;
        }
        
        .pagination .page-link {
            width: 35px;
            height: 35px;
            font-size: 0.8rem;
        }
        
        .pagination-container {
            padding: 15px;
            margin-top: 1.5rem;
        }
        
        .pagination-info {
            font-size: 0.8rem;
            margin-top: 0.8rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h1><i class="fas fa-briefcase"></i> <?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_header', 'Portofolio Kami')); ?></h1>
            <p class="lead"><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_subtitle', 'Jelajahi koleksi lengkap karya-karya terbaik LittleStar Studio')); ?></p>
        </div>
    </div>
</div>

<div class="container mb-5">
    <!-- Search Section -->
    <div class="search-section">
        <form action="<?php echo e(route('portfolio')); ?>" method="GET" class="search-form">
            <div class="search-input">
                <input type="text" name="search" class="form-control" 
                       placeholder="<?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_search_placeholder', 'Cari portofolio berdasarkan judul, deskripsi, kategori, atau klien...')); ?>" 
                       value="<?php echo e(request('search')); ?>">
            </div>
            <button type="submit" class="btn search-btn">
                <i class="fas fa-search me-2"></i><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_search_button', 'Cari')); ?>

            </button>
            <?php if(request('search') || request('category')): ?>
                <a href="<?php echo e(route('portfolio')); ?>" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_reset_button', 'Reset')); ?>

                </a>
            <?php endif; ?>
        </form>
        
        <?php if(request('search') || request('category')): ?>
            <div class="mt-3">
                <small class="text-muted">
                    <?php if(request('search') && request('category')): ?>
                        <?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_search_results_for', 'Menampilkan hasil pencarian untuk:')); ?> <strong>"<?php echo e(request('search')); ?>"</strong> 
                        dalam kategori <strong>"<?php echo e(request('category')); ?>"</strong>
                    <?php elseif(request('search')): ?>
                        <?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_search_results_for', 'Menampilkan hasil pencarian untuk:')); ?> <strong>"<?php echo e(request('search')); ?>"</strong>
                    <?php elseif(request('category')): ?>
                        <?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_search_category', 'Menampilkan portofolio kategori:')); ?> <strong>"<?php echo e(request('category')); ?>"</strong>
                    <?php endif; ?>
                    (<?php echo e($portfolios->total()); ?> <?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_search_results_found', 'hasil ditemukan')); ?>)
                </small>
            </div>
        <?php endif; ?>
        
        <!-- Category Filter -->
        <?php
            $categories = \App\Models\Portfolio::whereNotNull('category')
                                                ->where('category', '!=', '')
                                                ->distinct()
                                                ->pluck('category')
                                                ->sort();
        ?>
        
        <?php if($categories->count() > 0): ?>
            <div class="mt-3">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <small class="text-muted me-2"><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_filter_label', 'Filter kategori:')); ?></small>
                    <a href="<?php echo e(route('portfolio')); ?>" class="category-filter-btn <?php echo e(!request('category') ? 'active' : ''); ?>">
                        <?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_filter_all', 'Semua')); ?>

                    </a>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('portfolio')); ?>?category=<?php echo e(urlencode($category)); ?><?php echo e(request('search') ? '&search=' . urlencode(request('search')) : ''); ?>" 
                           class="category-filter-btn <?php echo e(request('category') == $category ? 'active' : ''); ?>">
                            <?php echo e($category); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Portofolio Grid -->
    <div class="portfolio-grid">
        <?php if($portfolios->count() > 0): ?>
            <div class="row">
                <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <a href="<?php echo e(route('portfolio.show', $portfolio)); ?>" class="text-decoration-none">
                            <div class="portfolio-card">
                                <?php if($portfolio->category): ?>
                                    <span class="badge-category"><?php echo e($portfolio->category); ?></span>
                                <?php endif; ?>
                                <div class="portfolio-image-container">
                                    <img src="<?php echo e(asset('storage/' . $portfolio->image_path)); ?>" alt="<?php echo e($portfolio->title); ?>">
                                </div>
                                <div class="portfolio-card-body">
                                    <h5 class="text-dark"><?php echo e($portfolio->title); ?></h5>
                                    <p><?php echo e(Str::limit($portfolio->description, 80)); ?></p>
                                    <div class="portfolio-meta">
                                        <?php if($portfolio->category): ?>
                                            <span class="category-tag">
                                                <i class="fas fa-tag me-1"></i><?php echo e($portfolio->category); ?>

                                            </span>
                                        <?php endif; ?>
                                        <?php if($portfolio->client): ?>
                                            <span class="client-tag">
                                                <i class="fas fa-user me-1"></i><?php echo e($portfolio->client); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <!-- Pagination -->
            <?php if($portfolios->hasPages()): ?>
                <div class="pagination-container">
                    <div class="pagination-wrapper">
                        <?php echo e($portfolios->withQueryString()->links('custom.pagination')); ?>

                    </div>
                    <div class="pagination-info">
                        <?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_pagination_showing', 'Menampilkan')); ?> <?php echo e($portfolios->firstItem()); ?> - <?php echo e($portfolios->lastItem()); ?> <?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_pagination_of', 'dari')); ?> <?php echo e($portfolios->total()); ?> <?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_pagination_portfolios', 'portofolio')); ?>

                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="empty-state">
                <?php if(request('search')): ?>
                    <i class="fas fa-search fa-5x"></i>
                    <h4><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_no_results_title', 'Tidak ada hasil ditemukan')); ?></h4>
                    <p><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_no_results_message', 'Coba gunakan kata kunci yang berbeda atau')); ?> <a href="<?php echo e(route('portfolio')); ?>"><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_no_results_link', 'lihat semua portofolio')); ?></a></p>
                <?php else: ?>
                    <i class="fas fa-folder-open fa-5x"></i>
                    <h4><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_empty_title', 'Belum ada portofolio')); ?></h4>
                    <p><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_empty_message', 'Portofolio akan segera ditampilkan di sini')); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Social Media Section -->
    <?php
        $showSocial = \App\Models\WebsiteSetting::getValue('portfolio_show_social', '1');
        $hasAnySocial = \App\Models\WebsiteSetting::getValue('portfolio_social_instagram') || 
                       \App\Models\WebsiteSetting::getValue('portfolio_social_tiktok') || 
                       \App\Models\WebsiteSetting::getValue('portfolio_social_whatsapp') || 
                       \App\Models\WebsiteSetting::getValue('portfolio_social_email');
    ?>
    
    <?php if($showSocial == '1'): ?>
        <div class="social-media-section mt-5">
            <div class="container">
                <div class="social-media-container">
                    <div class="social-header text-center mb-4">
                        <h3><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_social_title', 'Ikuti Kami')); ?></h3>
                        <p class="lead"><?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_social_subtitle', 'Dapatkan update terbaru dari karya-karya kami')); ?></p>
                    </div>
                    
                    <?php if($hasAnySocial): ?>
                        <div class="social-links">
                            <?php if(\App\Models\WebsiteSetting::getValue('portfolio_social_instagram')): ?>
                                <a href="<?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_social_instagram')); ?>" target="_blank" class="social-icon-link social-instagram" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if(\App\Models\WebsiteSetting::getValue('portfolio_social_tiktok')): ?>
                                <a href="<?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_social_tiktok')); ?>" target="_blank" class="social-icon-link social-tiktok" title="TikTok">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if(\App\Models\WebsiteSetting::getValue('portfolio_social_whatsapp')): ?>
                                <a href="https://wa.me/<?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_social_whatsapp')); ?>" target="_blank" class="social-icon-link social-whatsapp" title="WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if(\App\Models\WebsiteSetting::getValue('portfolio_social_email')): ?>
                                <a href="mailto:<?php echo e(\App\Models\WebsiteSetting::getValue('portfolio_social_email')); ?>" class="social-icon-link social-email" title="Email">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center">
                            <div class="alert alert-info d-inline-block">
                                <i class="fas fa-info-circle me-2"></i>
                                Belum ada link media sosial yang dikonfigurasi. 
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->user()->isAdmin()): ?>
                                        <a href="<?php echo e(route('admin.portfolio-page.index')); ?>" class="alert-link">Konfigurasi di sini</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/portfolio.blade.php ENDPATH**/ ?>