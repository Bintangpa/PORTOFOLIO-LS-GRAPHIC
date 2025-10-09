<?php $__env->startSection('title', 'Website Settings - Admin'); ?>
<?php $__env->startSection('page-title', 'Website Settings'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .settings-form-container {
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
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
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
        border-color: #000099;
        box-shadow: 0 0 0 3px rgba(0, 0, 153, 0.1);
        background: white;
    }

    .form-text {
        font-size: 0.85rem;
        color: #6b7280;
        margin-top: 5px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        border: none;
        border-radius: 12px;
        padding: 15px 40px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 153, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0000cc 0%, #000099 100%);
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(0, 0, 153, 0.4);
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

    .row {
        margin-left: -10px;
        margin-right: -10px;
    }

    .row > * {
        padding-left: 10px;
        padding-right: 10px;
    }

    .save-section {
        background: #f8fafc;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        margin-top: 25px;
        border: 1px solid #e2e8f0;
    }

    .preview-note {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        border: 1px solid #3b82f6;
        color: #1e40af;
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 20px;
        text-align: center;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .settings-form-container {
            padding: 20px;
            margin-bottom: 15px;
        }
        
        .section-header {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .preview-note {
            padding: 12px 15px;
            font-size: 0.85rem;
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

    <!-- Security Notice -->
    <div class="alert alert-warning">
        <i class="fas fa-shield-alt me-2"></i>
        <strong>Akses Admin:</strong> Halaman ini hanya dapat diakses oleh administrator. 
        Semua perubahan pengaturan website memerlukan hak akses admin.
    </div>

    <!-- Preview Note -->
    <div class="preview-note">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Info:</strong> Perubahan akan langsung terlihat di seluruh website setelah disimpan. 
        Pastikan untuk preview website setelah melakukan perubahan.
    </div>

    <div class="settings-form-container">
        <form action="<?php echo e(route('admin.website.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Brand Identity -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="section-title">Brand Identity</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Website</label>
                            <input type="text" name="settings[site_name]" class="form-control" 
                                   value="<?php echo e($settings['site_name']); ?>" required>
                            <div class="form-text">Nama utama yang muncul di navbar, title, dan footer</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Tagline Website</label>
                            <input type="text" name="settings[site_tagline]" class="form-control" 
                                   value="<?php echo e($settings['site_tagline']); ?>">
                            <div class="form-text">Slogan yang muncul di halaman utama</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Deskripsi Website</label>
                    <textarea name="settings[site_description]" class="form-control" rows="3"><?php echo e($settings['site_description']); ?></textarea>
                    <div class="form-text">Deskripsi singkat tentang website/perusahaan</div>
                </div>
            </div>

            <!-- Page Titles -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-window-maximize"></i>
                    </div>
                    <h3 class="section-title">Judul Halaman (Browser Tab)</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul Halaman Beranda</label>
                            <input type="text" name="settings[home_title]" class="form-control" 
                                   value="<?php echo e($settings['home_title']); ?>" required>
                            <div class="form-text">Muncul di tab browser halaman beranda</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul Halaman Portofolio</label>
                            <input type="text" name="settings[portfolio_title]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_title']); ?>" required>
                            <div class="form-text">Muncul di tab browser halaman portofolio</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul Halaman About</label>
                            <input type="text" name="settings[about_title]" class="form-control" 
                                   value="<?php echo e($settings['about_title']); ?>" required>
                            <div class="form-text">Muncul di tab browser halaman tentang</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul Halaman Kontak</label>
                            <input type="text" name="settings[contact_title]" class="form-control" 
                                   value="<?php echo e($settings['contact_title']); ?>" required>
                            <div class="form-text">Muncul di tab browser halaman kontak</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Headers -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-heading"></i>
                    </div>
                    <h3 class="section-title">Header Halaman</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Header Halaman Beranda</label>
                            <input type="text" name="settings[home_header]" class="form-control" 
                                   value="<?php echo e($settings['home_header']); ?>" required>
                            <div class="form-text">Judul besar di halaman beranda</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Header Halaman Portofolio</label>
                            <input type="text" name="settings[portfolio_header]" class="form-control" 
                                   value="<?php echo e($settings['portfolio_header']); ?>" required>
                            <div class="form-text">Judul besar di halaman portofolio</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Subtitle Portofolio</label>
                    <textarea name="settings[portfolio_subtitle]" class="form-control" rows="2"><?php echo e($settings['portfolio_subtitle']); ?></textarea>
                    <div class="form-text">Subtitle yang muncul di bawah header portofolio</div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Header Halaman About</label>
                            <input type="text" name="settings[about_header]" class="form-control" 
                                   value="<?php echo e($settings['about_header']); ?>" required>
                            <div class="form-text">Judul besar di halaman tentang</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Header Halaman Kontak</label>
                            <input type="text" name="settings[contact_header]" class="form-control" 
                                   value="<?php echo e($settings['contact_header']); ?>" required>
                            <div class="form-text">Judul besar di halaman kontak</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Subtitle Kontak</label>
                    <textarea name="settings[contact_subtitle]" class="form-control" rows="2"><?php echo e($settings['contact_subtitle']); ?></textarea>
                    <div class="form-text">Subtitle yang muncul di bawah header kontak</div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-address-book"></i>
                    </div>
                    <h3 class="section-title">Informasi Kontak</h3>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Nomor WhatsApp</label>
                            <input type="text" name="settings[contact_whatsapp]" class="form-control" 
                                   value="<?php echo e($settings['contact_whatsapp']); ?>" required 
                                   placeholder="62123456789">
                            <div class="form-text">Nomor WhatsApp tanpa tanda + (contoh: 62123456789)</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Username Instagram</label>
                            <input type="text" name="settings[contact_instagram]" class="form-control" 
                                   value="<?php echo e($settings['contact_instagram']); ?>" required 
                                   placeholder="littlestarstudio">
                            <div class="form-text">Username Instagram tanpa @ (contoh: littlestarstudio)</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Email Kontak</label>
                            <input type="email" name="settings[contact_email]" class="form-control" 
                                   value="<?php echo e($settings['contact_email']); ?>" required 
                                   placeholder="info@littlestarstudio.com">
                            <div class="form-text">Email utama untuk kontak</div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info">
                    <i class="fas fa-user-shield me-2"></i>
                    <strong>Khusus Admin:</strong> Informasi kontak ini akan muncul di tombol kontak pada halaman pencarian portofolio. 
                    Hanya administrator yang dapat mengubah pengaturan ini.
                </div>
            </div>

            <!-- Footer & Others -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h3 class="section-title">Footer & Lainnya</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Copyright Footer</label>
                            <input type="text" name="settings[footer_copyright]" class="form-control" 
                                   value="<?php echo e($settings['footer_copyright']); ?>" required>
                            <div class="form-text">Teks copyright di footer</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Teks Loading Screen</label>
                            <input type="text" name="settings[loading_text]" class="form-control" 
                                   value="<?php echo e($settings['loading_text']); ?>" required>
                            <div class="form-text">Teks yang muncul di loading screen</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Judul Admin Dashboard</label>
                            <input type="text" name="settings[admin_title]" class="form-control" 
                                   value="<?php echo e($settings['admin_title']); ?>" required>
                            <div class="form-text">Title halaman admin dashboard</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Brand Admin Sidebar</label>
                            <input type="text" name="settings[admin_brand]" class="form-control" 
                                   value="<?php echo e($settings['admin_brand']); ?>" required>
                            <div class="form-text">Nama brand di sidebar admin</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="save-section">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save me-2"></i>Simpan Semua Pengaturan
                </button>
                <div class="mt-3">
                    <small class="text-muted">Perubahan akan langsung terlihat di seluruh website</small>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Form validation and loading state
    document.querySelector('form').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
        submitBtn.disabled = true;
    });

    // Auto-resize textareas
    document.querySelectorAll('textarea').forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/admin/website/index.blade.php ENDPATH**/ ?>