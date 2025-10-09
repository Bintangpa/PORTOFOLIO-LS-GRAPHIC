<?php $__env->startSection('title', 'Pencarian Portofolio - ' . \App\Models\WebsiteSetting::getValue('site_name', 'LittleStar Studio')); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4">
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

    <div class="search-layout">
        <!-- Filter Sidebar -->
        <div class="filter-sidebar-container">
            <div class="filter-sidebar">
                <div class="filter-header">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-filter me-2"></i>Filter Pencarian
                    </h5>
                </div>
                
                <div class="filter-content">
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

                    <!-- Contact Buttons -->
                    <div class="contact-buttons">
                        <a href="https://wa.me/<?php echo e(\App\Models\WebsiteSetting::getValue('contact_whatsapp', '62123456789')); ?>" target="_blank" class="btn btn-success w-100 mb-2">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp
                        </a>
                        <a href="https://instagram.com/<?php echo e(\App\Models\WebsiteSetting::getValue('contact_instagram', 'littlestarstudio')); ?>" target="_blank" class="btn btn-instagram w-100 mb-2">
                            <i class="fab fa-instagram me-2"></i>Instagram
                        </a>
                        <a href="mailto:<?php echo e(\App\Models\WebsiteSetting::getValue('contact_email', 'info@littlestarstudio.com')); ?>" class="btn btn-email w-100">
                            <i class="fas fa-envelope me-2"></i>Email
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Area -->
        <div class="results-area">
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

            <!-- Results List -->
            <div class="results-container">
                <?php if($portfolios->count() > 0): ?>
                    <div class="portfolio-list">
                        <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="portfolio-list-item" data-portfolio-id="<?php echo e($portfolio->id); ?>">
                                <div class="portfolio-thumbnail">
                                    <img src="<?php echo e(asset('storage/' . $portfolio->image_path)); ?>" 
                                         alt="<?php echo e($portfolio->title); ?>" class="img-fluid">
                                </div>
                                <div class="portfolio-info">
                                    <div class="portfolio-header">
                                        <h6 class="portfolio-title mb-1"><?php echo e($portfolio->title); ?></h6>
                                        <?php if($portfolio->category): ?>
                                            <span class="badge badge-category-small"><?php echo e($portfolio->category); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="portfolio-description mb-1">
                                        <?php echo e(Str::limit($portfolio->description, 100)); ?>

                                    </p>
                                    <?php if($portfolio->client): ?>
                                        <small class="text-muted">
                                            <i class="fas fa-user me-1"></i>
                                            <?php echo e($portfolio->client); ?>

                                        </small>
                                    <?php endif; ?>
                                </div>
                                <div class="portfolio-actions">
                                    <a href="<?php echo e(route('portfolio.show', $portfolio)); ?>" 
                                       class="btn btn-sm btn-primary">
                                        <i class="fas fa-external-link-alt me-1"></i>Lihat
                                    </a>
                                </div>
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
:root {
    --navbar-height: 80px;
}

/* Ensure navbar stays above sticky filter */
.navbar.sticky-top {
    z-index: 1030 !important;
}

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

.search-layout {
    position: relative;
    display: flex;
    min-height: calc(100vh - 200px);
    gap: 30px;
}

.filter-sidebar-container {
    position: sticky;
    top: calc(var(--navbar-height, 80px) + 20px);
    width: 320px;
    height: fit-content;
    flex-shrink: 0;
    align-self: flex-start;
    z-index: 1000;
}

.filter-sidebar {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 20px;
    padding: 0;
    box-shadow: 0 10px 40px rgba(0,0,0,0.15);
    border: 1px solid #e2e8f0;
    width: 100%;
    transition: all 0.3s ease;
    position: relative;
    height: auto;
}



/* Removed scrollbar styles as scrolling is no longer needed */

.results-area {
    flex: 1;
    background: white;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    border: 1px solid #e2e8f0;
    padding: 2rem;
    position: relative;
    min-height: calc(100vh - 200px);
}

.filter-header {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-bottom: 1px solid #e2e8f0;
    padding: 2rem 1.5rem 1rem 1.5rem;
    margin-bottom: 0;
    border-radius: 20px 20px 0 0;
    position: relative;
}

.filter-content {
    padding: 1.5rem;
    padding-top: 0;
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



.active-filters {
    background: #f8fafc;
    border-radius: 10px;
    padding: 1rem;
    border: 1px solid #e2e8f0;
}

/* Contact Buttons */
.contact-buttons {
    margin-top: 1.5rem;
}

.contact-buttons .btn {
    border: none;
    border-radius: 15px;
    padding: 0.8rem 1rem;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    text-decoration: none;
}

.contact-buttons .btn:hover {
    transform: translateY(-2px);
    text-decoration: none;
}

/* WhatsApp Button */
.contact-buttons .btn-success {
    background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
    box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
}

.contact-buttons .btn-success:hover {
    background: linear-gradient(135deg, #128c7e 0%, #25d366 100%);
    box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
}

/* Instagram Button */
.contact-buttons .btn-instagram {
    background: linear-gradient(135deg, #e4405f 0%, #833ab4 50%, #fccc63 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(228, 64, 95, 0.3);
}

.contact-buttons .btn-instagram:hover {
    background: linear-gradient(135deg, #833ab4 0%, #e4405f 50%, #fccc63 100%);
    color: white;
    box-shadow: 0 6px 20px rgba(228, 64, 95, 0.4);
}

/* Email Button */
.contact-buttons .btn-email {
    background: linear-gradient(135deg, #4285f4 0%, #34a853 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(66, 133, 244, 0.3);
}

.contact-buttons .btn-email:hover {
    background: linear-gradient(135deg, #34a853 0%, #4285f4 100%);
    color: white;
    box-shadow: 0 6px 20px rgba(66, 133, 244, 0.4);
}

/* Portfolio List Styles */
.portfolio-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.portfolio-list-item {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.portfolio-list-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    border-color: #1e3a8a;
}

.portfolio-thumbnail {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
    position: relative;
}

.portfolio-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.portfolio-list-item:hover .portfolio-thumbnail img {
    transform: scale(1.1);
}

.portfolio-info {
    flex: 1;
    min-width: 0;
}

.portfolio-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 0.5rem;
}

.portfolio-title {
    font-weight: 600;
    color: #1f2937;
    font-size: 1rem;
    margin: 0;
}

.badge-category-small {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-weight: 500;
    font-size: 0.7rem;
}

.portfolio-description {
    color: #6b7280;
    font-size: 0.9rem;
    line-height: 1.4;
    margin: 0;
}

.portfolio-actions {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    flex-shrink: 0;
}

.portfolio-actions .btn {
    min-width: 80px;
    font-size: 0.8rem;
    padding: 0.4rem 0.8rem;
}

/* Responsive adjustments */
@media (max-width: 767.98px) {
    .portfolio-list-item {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .portfolio-thumbnail {
        width: 100px;
        height: 100px;
        align-self: center;
    }
    
    .portfolio-header {
        flex-direction: column;
        gap: 0.5rem;
        text-align: center;
    }
    
    .portfolio-actions {
        flex-direction: row;
        justify-content: center;
        width: 100%;
    }
    
    .portfolio-actions .btn {
        min-width: 100px;
    }
    
    .modal-body .row {
        flex-direction: column-reverse;
    }
    
    .modal-body .col-md-4 {
        margin-bottom: 1rem;
    }
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
    .search-layout {
        flex-direction: column;
        gap: 20px;
        min-height: auto;
    }
    
    .filter-sidebar-container {
        position: fixed;
        top: var(--navbar-height, 80px);
        left: 0;
        right: 0;
        width: 100%;
        height: auto;
        z-index: 1000;
        padding: 0 1rem;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        border-bottom: 1px solid #e2e8f0;
    }
    
    .filter-sidebar {
        border-radius: 0;
        border: none;
        height: auto;
        background: transparent;
        box-shadow: none;
        padding: 1rem 0;
    }
    
    .filter-header {
        padding: 1rem 0 0.5rem 0;
        border-radius: 0;
        background: transparent;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .filter-content {
        padding: 1rem 0;
    }
    
    /* Mobile Contact Buttons */
    .contact-buttons {
        margin-top: 1rem;
    }
    
    .contact-buttons .btn {
        font-size: 0.85rem;
        padding: 0.7rem 1rem;
        border-radius: 12px;
    }
    
    /* Add top margin to results area to account for fixed filter */
    .results-area {
        margin-top: 200px; /* Adjust based on filter height */
        padding: 1.5rem;
        min-height: auto;
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

@media (min-width: 992px) {
    .filter-sidebar-container {
        width: 320px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Calculate and set navbar height
    function updateNavbarHeight() {
        const navbar = document.querySelector('.navbar');
        if (navbar) {
            const navbarHeight = navbar.offsetHeight;
            document.documentElement.style.setProperty('--navbar-height', navbarHeight + 'px');
        }
    }
    
    // Update navbar height on load and resize
    updateNavbarHeight();
    window.addEventListener('resize', updateNavbarHeight);
    
    // Mobile filter height adjustment
    function adjustMobileLayout() {
        if (window.innerWidth <= 991.98) {
            const filterContainer = document.querySelector('.filter-sidebar-container');
            const resultsArea = document.querySelector('.results-area');
            
            if (filterContainer && resultsArea) {
                // Wait for DOM to be fully rendered
                setTimeout(() => {
                    const filterHeight = filterContainer.offsetHeight;
                    const navbarHeight = document.querySelector('.navbar')?.offsetHeight || 80;
                    const totalOffset = navbarHeight + filterHeight + 20; // 20px for spacing
                    
                    resultsArea.style.marginTop = totalOffset + 'px';
                }, 100);
            }
        } else {
            // Reset margin for desktop
            const resultsArea = document.querySelector('.results-area');
            if (resultsArea) {
                resultsArea.style.marginTop = '';
            }
        }
    }
    
    // Adjust layout on load and resize
    adjustMobileLayout();
    window.addEventListener('resize', adjustMobileLayout);
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/search.blade.php ENDPATH**/ ?>