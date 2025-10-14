<?php $__env->startSection('title', 'Portfolio Page Control - Admin'); ?>
<?php $__env->startSection('page-title', 'Portfolio Page Control'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .portfolio-control-container {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        border: 1px solid #e2e8f0;
    }

    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f1f5f9;
    }

    .section-icon {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
        margin-right: 15px;
    }

    .section-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }

    .form-section {
        margin-bottom: 40px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        display: block;
    }

    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 15px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus, .form-select:focus {
        border-color: #1e3a8a;
        box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
        background: white;
    }

    .form-text {
        font-size: 0.85rem;
        color: #6b7280;
        margin-top: 5px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        border: none;
        border-radius: 12px;
        padding: 15px 40px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(30, 58, 138, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(30, 58, 138, 0.4);
    }

    .alert {
        border-radius: 15px;
        border: none;
        padding: 20px 25px;
        margin-bottom: 25px;
        font-weight: 500;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .alert-success {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #065f46;
        border-left: 4px solid #059669;
    }

    .alert-danger {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
        border-left: 4px solid #dc2626;
    }

    .alert-warning {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #92400e;
        border-left: 4px solid #f59e0b;
        font-weight: 500;
    }

    .alert-info {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: #1e40af;
        border-left: 4px solid #3b82f6;
        font-weight: 500;
    }

    .preview-section {
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
    }

    .preview-header {
        text-align: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .preview-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .preview-header p {
        font-size: 1.1rem;
        margin: 0;
        opacity: 0.9;
    }

    .preview-search {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }

    .preview-search-form {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 15px;
    }

    .preview-search input {
        flex: 1;
        min-width: 200px;
        padding: 10px 15px;
        border: 2px solid #e9ecef;
        border-radius: 25px;
        font-size: 0.9rem;
    }

    .preview-btn {
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        border: none;
        cursor: pointer;
    }

    .preview-btn-primary {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
    }

    .preview-btn-secondary {
        background: #6c757d;
        color: white;
    }

    .preview-filter {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
    }

    .preview-filter-btn {
        padding: 6px 12px;
        background: #f8f9fa;
        color: #6c757d;
        border: 1px solid #e9ecef;
        border-radius: 15px;
        font-size: 0.8rem;
        text-decoration: none;
    }

    .preview-filter-btn.active {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
        border-color: #1e3a8a;
    }

    .social-media-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 15px;
        max-width: 1200px;
    }

    .social-media-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 20px;
    }

    .social-icon {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
        color: white;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .social-instagram { background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); }
    .social-tiktok { background: #000000; }
    .social-whatsapp { background: #25d366; }
    .social-email { background: #ea4335; }

    .social-item-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .save-section {
        background: #f8fafc;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        margin-top: 25px;
        border: 1px solid #e2e8f0;
    }

    .form-check {
        margin-bottom: 15px;
    }

    .form-check-input {
        width: 1.2em;
        height: 1.2em;
        margin-top: 0.25em;
        border: 2px solid #d1d5db;
        border-radius: 4px;
    }

    .form-check-input:checked {
        background-color: #1e3a8a;
        border-color: #1e3a8a;
    }

    .form-check-label {
        font-weight: 500;
        color: #374151;
        margin-left: 8px;
    }

    @media (max-width: 768px) {
        .portfolio-control-container {
            padding: 20px;
            margin-bottom: 15px;
        }
        
        .section-header {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .social-media-grid {
            grid-template-columns: 1fr;
        }
        
        .preview-search-form {
            flex-direction: column;
        }
        
        .preview-search input {
            width: 100%;
            min-width: auto;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Alerts -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Info Notice -->
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Portfolio Page Control:</strong> Kelola tampilan halaman portofolio website Anda. 
        Perubahan akan langsung terlihat di halaman portofolio setelah disimpan.
    </div>

    <!-- Preview Section -->
    <div class="preview-section">
        <h4 class="mb-3"><i class="fas fa-eye me-2"></i>Preview Halaman Portofolio</h4>
        
        <!-- Header Preview -->
        <div class="preview-header">
            <h1 id="previewHeader"><?php echo e($settings['portfolio_header']); ?></h1>
            <p id="previewSubtitle"><?php echo e($settings['portfolio_subtitle']); ?></p>
        </div>
        
        <!-- Search Preview -->
        <div class="preview-search">
            <div class="preview-search-form">
                <input type="text" placeholder="<?php echo e($settings['portfolio_search_placeholder']); ?>" id="previewSearchPlaceholder" readonly>
                <button class="preview-btn preview-btn-primary" id="previewSearchButton"><?php echo e($settings['portfolio_search_button']); ?></button>
                <button class="preview-btn preview-btn-secondary" id="previewResetButton"><?php echo e($settings['portfolio_reset_button']); ?></button>
            </div>
            <div class="preview-filter">
                <small class="text-muted me-2" id="previewFilterLabel"><?php echo e($settings['portfolio_filter_label']); ?></small>
                <a href="#" class="preview-filter-btn active" id="previewFilterAll"><?php echo e($settings['portfolio_filter_all']); ?></a>
                <a href="#" class="preview-filter-btn">Logo Design</a>
                <a href="#" class="preview-filter-btn">Poster Design</a>
            </div>
        </div>
        
        <small class="text-muted mt-2 d-block">
            <i class="fas fa-lightbulb me-1"></i>
            Preview ini menunjukkan bagaimana halaman portofolio akan terlihat di website
        </small>
    </div>

    <div class="portfolio-control-container">
        <form action="<?php echo e(route('admin.portfolio-page.update')); ?>" method="POST" id="portfolioPageForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <!-- Debug Info -->
            <?php if(config('app.debug')): ?>
                <div class="alert alert-info">
                    <small><strong>Debug:</strong> Form akan dikirim ke: <?php echo e(route('admin.portfolio-page.update')); ?></small>
                </div>
            <?php endif; ?>

            <!-- Page Title Settings -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3 class="section-title">Pengaturan Judul Halaman</h3>
                </div>

                <div class="form-group">
                    <label class="form-label">Judul Halaman (Title Tag)</label>
                    <input type="text" name="settings[portfolio_title]" class="form-control" 
                           value="<?php echo e($settings['portfolio_title']); ?>" 
                           id="portfolioTitle" required>
                    <div class="form-text">Judul yang muncul di tab browser dan hasil pencarian Google</div>
                </div>
            </div>

            <!-- Header Section Settings -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-heading"></i>
                    </div>
                    <h3 class="section-title">Pengaturan Header Halaman</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul Header</label>
                            <input type="text" name="settings[portfolio_header]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_header']); ?>" 
                                   id="portfolioHeader" required>
                            <div class="form-text">Judul utama yang ditampilkan di bagian atas halaman portofolio</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Subtitle Header</label>
                            <textarea name="settings[portfolio_subtitle]" class="form-control" 
                                      rows="3" id="portfolioSubtitle" required><?php echo e($settings['portfolio_subtitle']); ?></textarea>
                            <div class="form-text">Deskripsi singkat yang muncul di bawah judul header</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Section Settings -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="section-title">Pengaturan Pencarian & Filter</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Placeholder Pencarian</label>
                            <input type="text" name="settings[portfolio_search_placeholder]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_search_placeholder']); ?>" 
                                   id="searchPlaceholder" required>
                            <div class="form-text">Teks yang muncul di kolom pencarian</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Teks Tombol Cari</label>
                            <input type="text" name="settings[portfolio_search_button]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_search_button']); ?>" 
                                   id="searchButton" required>
                            <div class="form-text">Teks pada tombol pencarian</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Teks Tombol Reset</label>
                            <input type="text" name="settings[portfolio_reset_button]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_reset_button']); ?>" 
                                   id="resetButton" required>
                            <div class="form-text">Teks pada tombol reset</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Label Filter Kategori</label>
                            <input type="text" name="settings[portfolio_filter_label]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_filter_label']); ?>" 
                                   id="filterLabel" required>
                            <div class="form-text">Label yang muncul sebelum tombol filter kategori</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Teks Filter "Semua"</label>
                            <input type="text" name="settings[portfolio_filter_all]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_filter_all']); ?>" 
                                   id="filterAll" required>
                            <div class="form-text">Teks untuk tombol filter "Semua kategori"</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Results Settings -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-list-ul"></i>
                    </div>
                    <h3 class="section-title">Pengaturan Hasil Pencarian</h3>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Teks "Hasil Pencarian"</label>
                            <input type="text" name="settings[portfolio_search_results_for]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_search_results_for']); ?>" required>
                            <div class="form-text">Teks yang muncul saat menampilkan hasil pencarian</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Teks "Kategori"</label>
                            <input type="text" name="settings[portfolio_search_category]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_search_category']); ?>" required>
                            <div class="form-text">Teks yang muncul saat filter berdasarkan kategori</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Teks "Hasil Ditemukan"</label>
                            <input type="text" name="settings[portfolio_search_results_found]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_search_results_found']); ?>" required>
                            <div class="form-text">Teks yang muncul setelah jumlah hasil</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty States Settings -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <h3 class="section-title">Pengaturan Pesan Kosong</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul "Tidak Ada Hasil"</label>
                            <input type="text" name="settings[portfolio_no_results_title]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_no_results_title']); ?>" required>
                            <div class="form-text">Judul yang muncul saat pencarian tidak menemukan hasil</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Pesan "Tidak Ada Hasil"</label>
                            <input type="text" name="settings[portfolio_no_results_message]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_no_results_message']); ?>" required>
                            <div class="form-text">Pesan yang muncul saat pencarian tidak menemukan hasil</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Link "Lihat Semua"</label>
                            <input type="text" name="settings[portfolio_no_results_link]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_no_results_link']); ?>" required>
                            <div class="form-text">Teks link untuk melihat semua portofolio</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul "Belum Ada Portofolio"</label>
                            <input type="text" name="settings[portfolio_empty_title]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_empty_title']); ?>" required>
                            <div class="form-text">Judul yang muncul saat belum ada portofolio</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Pesan "Belum Ada Portofolio"</label>
                            <input type="text" name="settings[portfolio_empty_message]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_empty_message']); ?>" required>
                            <div class="form-text">Pesan yang muncul saat belum ada portofolio</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination Settings -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-list-ol"></i>
                    </div>
                    <h3 class="section-title">Pengaturan Pagination</h3>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Teks "Menampilkan"</label>
                            <input type="text" name="settings[portfolio_pagination_showing]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_pagination_showing']); ?>" required>
                            <div class="form-text">Teks awal pada informasi pagination</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Teks "dari"</label>
                            <input type="text" name="settings[portfolio_pagination_of]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_pagination_of']); ?>" required>
                            <div class="form-text">Teks penghubung pada informasi pagination</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Teks "portofolio"</label>
                            <input type="text" name="settings[portfolio_pagination_portfolios]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_pagination_portfolios']); ?>" required>
                            <div class="form-text">Teks akhir pada informasi pagination</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Settings -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h3 class="section-title">Pengaturan Media Sosial</h3>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul Section Media Sosial</label>
                            <input type="text" name="settings[portfolio_social_title]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_social_title']); ?>" required>
                            <div class="form-text">Judul untuk section media sosial</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Subtitle Media Sosial</label>
                            <input type="text" name="settings[portfolio_social_subtitle]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_social_subtitle']); ?>" required>
                            <div class="form-text">Deskripsi untuk section media sosial</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Tampilkan Media Sosial</label>
                    <div class="form-check">
                        <input type="hidden" name="settings[portfolio_show_social]" value="0">
                        <input class="form-check-input" type="checkbox" 
                               name="settings[portfolio_show_social]" value="1" 
                               id="showSocial" 
                               <?php echo e($settings['portfolio_show_social'] == '1' ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="showSocial">
                            Ya, tampilkan section media sosial di halaman portofolio
                        </label>
                    </div>
                    <div class="form-text">Centang untuk menampilkan section media sosial</div>
                </div>

                <div class="social-media-grid">
                    <div class="social-media-item">
                        <div class="social-item-header">
                            <div class="social-icon social-instagram">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <strong>Instagram</strong>
                        </div>
                        <div class="form-group">
                            <label class="form-label">URL Instagram</label>
                            <input type="url" name="settings[portfolio_social_instagram]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_social_instagram']); ?>" 
                                   placeholder="https://instagram.com/username">
                        </div>
                    </div>

                    <div class="social-media-item">
                        <div class="social-item-header">
                            <div class="social-icon social-tiktok">
                                <i class="fab fa-tiktok"></i>
                            </div>
                            <strong>TikTok</strong>
                        </div>
                        <div class="form-group">
                            <label class="form-label">URL TikTok</label>
                            <input type="url" name="settings[portfolio_social_tiktok]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_social_tiktok']); ?>" 
                                   placeholder="https://tiktok.com/@username">
                        </div>
                    </div>

                    <div class="social-media-item">
                        <div class="social-item-header">
                            <div class="social-icon social-whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <strong>WhatsApp</strong>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nomor WhatsApp</label>
                            <input type="text" name="settings[portfolio_social_whatsapp]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_social_whatsapp']); ?>" 
                                   placeholder="628123456789">
                            <div class="form-text">Format: 628123456789 (tanpa tanda +)</div>
                        </div>
                    </div>

                    <div class="social-media-item">
                        <div class="social-item-header">
                            <div class="social-icon social-email">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <strong>Email</strong>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alamat Email</label>
                            <input type="email" name="settings[portfolio_social_email]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_social_email']); ?>" 
                                   placeholder="contact@example.com">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="save-section">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save me-2"></i>Simpan Pengaturan Portfolio Page
                </button>
                <div class="mt-3">
                    <small class="text-muted">Perubahan akan langsung terlihat di halaman portofolio website</small>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const portfolioHeader = document.getElementById('portfolioHeader');
    const portfolioSubtitle = document.getElementById('portfolioSubtitle');
    const searchPlaceholder = document.getElementById('searchPlaceholder');
    const searchButton = document.getElementById('searchButton');
    const resetButton = document.getElementById('resetButton');
    const filterLabel = document.getElementById('filterLabel');
    const filterAll = document.getElementById('filterAll');
    const form = document.getElementById('portfolioPageForm');
    
    // Preview elements
    const previewHeader = document.getElementById('previewHeader');
    const previewSubtitle = document.getElementById('previewSubtitle');
    const previewSearchPlaceholder = document.getElementById('previewSearchPlaceholder');
    const previewSearchButton = document.getElementById('previewSearchButton');
    const previewResetButton = document.getElementById('previewResetButton');
    const previewFilterLabel = document.getElementById('previewFilterLabel');
    const previewFilterAll = document.getElementById('previewFilterAll');

    // Update preview function
    function updatePreview() {
        if (previewHeader) previewHeader.textContent = portfolioHeader.value;
        if (previewSubtitle) previewSubtitle.textContent = portfolioSubtitle.value;
        if (previewSearchPlaceholder) previewSearchPlaceholder.placeholder = searchPlaceholder.value;
        if (previewSearchButton) previewSearchButton.textContent = searchButton.value;
        if (previewResetButton) previewResetButton.textContent = resetButton.value;
        if (previewFilterLabel) previewFilterLabel.textContent = filterLabel.value;
        if (previewFilterAll) previewFilterAll.textContent = filterAll.value;
    }

    // Event listeners for real-time preview
    if (portfolioHeader) portfolioHeader.addEventListener('input', updatePreview);
    if (portfolioSubtitle) portfolioSubtitle.addEventListener('input', updatePreview);
    if (searchPlaceholder) searchPlaceholder.addEventListener('input', updatePreview);
    if (searchButton) searchButton.addEventListener('input', updatePreview);
    if (resetButton) resetButton.addEventListener('input', updatePreview);
    if (filterLabel) filterLabel.addEventListener('input', updatePreview);
    if (filterAll) filterAll.addEventListener('input', updatePreview);

    // Form submission handling
    if (form) {
        form.addEventListener('submit', function(e) {
            console.log('Form submitting...');
            console.log('Form action:', this.action);
            console.log('Form method:', this.method);
            
            // Log form data for debugging
            const formData = new FormData(this);
            console.log('Form data:');
            for (let [key, value] of formData.entries()) {
                console.log(key + ': ' + value);
            }
            
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
                submitBtn.disabled = true;
            }
        });
    }

    // Initialize preview
    updatePreview();
    
    // Debug info
    console.log('Portfolio Page Control initialized');
    console.log('Form element:', form);
    console.log('Form action:', form ? form.action : 'No form found');
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/admin/portfolio-page/index.blade.php ENDPATH**/ ?>