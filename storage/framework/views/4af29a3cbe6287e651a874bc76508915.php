<?php $__env->startSection('title', 'Pencarian Portofolio - ' . \App\Models\WebsiteSetting::getValue('site_name', 'LittleStar Studio')); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="search-header">
        <div class="row align-items-center mb-4">
            <div class="col-lg-6">
                <h1 class="search-title">
                    <i class="fas fa-search me-2"></i>
                    <span class="text-gradient">Pencarian</span> Portofolio
                </h1>
                <p class="text-muted mb-0">
                    Temukan desain yang sesuai dengan kebutuhan Anda
                </p>
            </div>
            <div class="col-lg-6">
                <div class="search-stats">
                    <?php if(request()->hasAny(['search', 'category', 'sort'])): ?>
                        <span class="badge bg-primary fs-6">
                            <?php echo e($portfolios->total()); ?> hasil ditemukan
                        </span>
                    <?php else: ?>
                        <span class="badge bg-secondary fs-6">
                            <?php echo e($portfolios->total()); ?> total portofolio
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-lg-3 mb-4">
            <div class="filter-sidebar">
                <div class="filter-header">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-filter me-2"></i>Filter Pencarian
                    </h5>
                </div>

                <form method="GET" action="<?php echo e(route('search')); ?>" id="filterForm">
                    <!-- Search Input -->
                    <div class="filter-section">
                        <label class="filter-label">Kata Kunci</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" 
                                   placeholder="Masukkan kata kunci..." 
                                   value="<?php echo e(request('search')); ?>">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="filter-section">
                        <label class="filter-label">Kategori</label>
                        <select class="form-select mb-3" name="category" onchange="this.form.submit()">
                            <option value="all" <?php echo e(request('category') == 'all' || !request('category') ? 'selected' : ''); ?>>
                                Semua Kategori
                            </option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category); ?>" <?php echo e(request('category') == $category ? 'selected' : ''); ?>>
                                    <?php echo e(ucfirst($category)); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Sort Filter -->
                    <div class="filter-section">
                        <label class="filter-label">Urutkan</label>
                        <select class="form-select mb-3" name="sort" onchange="this.form.submit()">
                            <option value="newest" <?php echo e(request('sort') == 'newest' || !request('sort') ? 'selected' : ''); ?>>
                                Terbaru
                            </option>
                            <option value="oldest" <?php echo e(request('sort') == 'oldest' ? 'selected' : ''); ?>>
                                Terlama
                            </option>
                            <option value="title_asc" <?php echo e(request('sort') == 'title_asc' ? 'selected' : ''); ?>>
                                Judul A-Z
                            </option>
                            <option value="title_desc" <?php echo e(request('sort') == 'title_desc' ? 'selected' : ''); ?>>
                                Judul Z-A
                            </option>
                        </select>
                    </div>

                    <!-- Clear Filters -->
                    <?php if(request()->hasAny(['search', 'category', 'sort'])): ?>
                        <div class="filter-section">
                            <a href="<?php echo e(route('search')); ?>" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-times me-2"></i>Hapus Filter
                            </a>
                        </div>
                    <?php endif; ?>
                </form>

                <!-- Quick Filters -->
                <div class="quick-filters mt-4">
                    <h6 class="fw-semibold mb-3">Filter Cepat</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <?php $__currentLoopData = $categories->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('search')); ?>?category=<?php echo e($category); ?>" 
                               class="badge bg-light text-dark text-decoration-none quick-filter-badge">
                                <?php echo e(ucfirst($category)); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Area -->
        <div class="col-lg-9">
            <!-- Active Filters -->
            <?php if(request()->hasAny(['search', 'category', 'sort'])): ?>
                <div class="active-filters mb-4">
                    <h6 class="fw-semibold mb-2">Filter Aktif:</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <?php if(request('search')): ?>
                            <span class="badge bg-primary">
                                Pencarian: "<?php echo e(request('search')); ?>"
                                <a href="<?php echo e(route('search')); ?>?<?php echo e(http_build_query(request()->except('search'))); ?>" 
                                   class="text-white ms-1">×</a>
                            </span>
                        <?php endif; ?>
                        <?php if(request('category') && request('category') !== 'all'): ?>
                            <span class="badge bg-success">
                                Kategori: <?php echo e(ucfirst(request('category'))); ?>

                                <a href="<?php echo e(route('search')); ?>?<?php echo e(http_build_query(request()->except('category'))); ?>" 
                                   class="text-white ms-1">×</a>
                            </span>
                        <?php endif; ?>
                        <?php if(request('sort') && request('sort') !== 'newest'): ?>
                            <span class="badge bg-info">
                                Urutan: 
                                <?php switch(request('sort')):
                                    case ('oldest'): ?> Terlama <?php break; ?>
                                    <?php case ('title_asc'): ?> A-Z <?php break; ?>
                                    <?php case ('title_desc'): ?> Z-A <?php break; ?>
                                <?php endswitch; ?>
                                <a href="<?php echo e(route('search')); ?>?<?php echo e(http_build_query(request()->except('sort'))); ?>" 
                                   class="text-white ms-1">×</a>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Results Grid -->
            <div class="results-container">
                <?php if($portfolios->count() > 0): ?>
                    <div class="row">
                        <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <a href="<?php echo e(route('portfolio.show', $portfolio)); ?>" class="text-decoration-none">
                                    <div class="portfolio-card">
                                        <?php if($portfolio->category): ?>
                                            <span class="badge-category"><?php echo e($portfolio->category); ?></span>
                                        <?php endif; ?>
                                        <div class="portfolio-image">
                                            <img src="<?php echo e(asset('storage/' . $portfolio->image_path)); ?>" 
                                                 alt="<?php echo e($portfolio->title); ?>" class="img-fluid">
                                        </div>
                                        <div class="portfolio-card-body">
                                            <h5 class="portfolio-title"><?php echo e($portfolio->title); ?></h5>
                                            <p class="portfolio-description">
                                                <?php echo e(Str::limit($portfolio->description, 80)); ?>

                                            </p>
                                            <?php if($portfolio->client): ?>
                                                <div class="portfolio-client">
                                                    <small class="text-muted">
                                                        <i class="fas fa-user me-1"></i>
                                                        <?php echo e($portfolio->client); ?>

                                                    </small>
                                                </div>
                                            <?php endif; ?>
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
                                Menampilkan <?php echo e($portfolios->firstItem()); ?> - <?php echo e($portfolios->lastItem()); ?> dari <?php echo e($portfolios->total()); ?> portofolio
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="no-results">
                        <div class="text-center py-5">
                            <i class="fas fa-search fa-5x text-muted mb-3"></i>
                            <h4 class="text-muted">Tidak ada hasil ditemukan</h4>
                            <p class="text-muted mb-4">
                                Coba ubah kata kunci atau filter pencarian Anda
                            </p>
                            <a href="<?php echo e(route('search')); ?>" class="btn btn-primary">
                                <i class="fas fa-refresh me-2"></i>Reset Pencarian
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
.text-gradient {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.search-header {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    border: 1px solid #e2e8f0;
}

.search-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.search-stats {
    text-align: right;
}

.filter-sidebar {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    border: 1px solid #e2e8f0;
    position: sticky;
    top: 100px;
}

.filter-header {
    border-bottom: 1px solid #e2e8f0;
    padding-bottom: 1rem;
    margin-bottom: 1.5rem;
}

.filter-section {
    margin-bottom: 1.5rem;
}

.filter-label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
    display: block;
}

.form-control, .form-select {
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    padding: 0.75rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #1e3a8a;
    box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25);
}

.quick-filter-badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
}

.quick-filter-badge:hover {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%) !important;
    color: white !important;
    transform: translateY(-2px);
}

.active-filters {
    background: #f8fafc;
    border-radius: 10px;
    padding: 1rem;
    border: 1px solid #e2e8f0;
}

.portfolio-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    position: relative;
}

.portfolio-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.portfolio-image {
    position: relative;
    width: 100%;
    aspect-ratio: 4/3;
    overflow: hidden;
}

.portfolio-image img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.portfolio-card:hover .portfolio-image img {
    transform: scale(1.1);
}

.badge-category {
    position: absolute;
    top: 15px;
    right: 15px;
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.8rem;
    z-index: 2;
}

.portfolio-card-body {
    padding: 1.5rem;
}

.portfolio-title {
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.portfolio-description {
    color: #6b7280;
    font-size: 0.9rem;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.portfolio-tech {
    border-top: 1px solid #e2e8f0;
    padding-top: 0.75rem;
}

.no-results {
    background: white;
    border-radius: 15px;
    padding: 3rem;
    text-align: center;
    border: 1px solid #e2e8f0;
}

.btn-primary {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border: none;
    border-radius: 25px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(30, 58, 138, 0.3);
}

.btn-outline-primary {
    border: 2px solid #1e3a8a;
    color: #1e3a8a;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border-color: #1e3a8a;
    color: white;
}

.btn-outline-secondary {
    border: 2px solid #6b7280;
    color: #6b7280;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-secondary:hover {
    background: #6b7280;
    border-color: #6b7280;
    color: white;
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
    border: 2px solid #1e3a8a;
    border-radius: 50%;
    color: white;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
}

.pagination .page-link:hover {
    background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
    border-color: #1e40af;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(30, 58, 138, 0.4);
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

/* Previous/Next buttons */
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
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border-color: #1e3a8a;
    color: white;
}

.pagination .page-item:first-child .page-link:hover,
.pagination .page-item:last-child .page-link:hover {
    background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
    border-color: #1e40af;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(30, 58, 138, 0.4);
}

/* Pagination container */
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

@media (max-width: 991.98px) {
    .filter-sidebar {
        position: static;
        margin-bottom: 2rem;
    }
    
    .search-stats {
        text-align: left;
        margin-top: 1rem;
    }
    
    .search-title {
        font-size: 2rem;
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/search.blade.php ENDPATH**/ ?>