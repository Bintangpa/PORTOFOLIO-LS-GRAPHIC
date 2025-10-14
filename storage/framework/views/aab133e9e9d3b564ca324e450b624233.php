<?php $__env->startSection('title', 'Navbar Control Panel - Admin'); ?>
<?php $__env->startSection('page-title', 'Navbar Control Panel'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .navbar-control-container {
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

    .navbar-preview {
        background: white;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        min-height: 60px;
    }
    
    .navbar-preview .badge {
        font-size: 0.8rem;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 500;
    }
    
    .navbar-preview .badge.bg-primary {
        background-color: #1e3a8a !important;
    }
    
    .navbar-preview .badge.bg-secondary {
        background-color: #6b7280 !important;
    }
    
    .navbar-preview .badge.bg-info {
        background-color: #0ea5e9 !important;
        color: white !important;
    }

    .preview-logo {
        max-height: 60px;
        width: auto;
        border-radius: 5px;
    }

    .preview-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1e293b;
        margin: 0;
    }

    .logo-upload-area {
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        background: #f9fafb;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .logo-upload-area:hover {
        border-color: #1e3a8a;
        background: #f0f9ff;
    }

    .logo-upload-area.dragover {
        border-color: #1e3a8a;
        background: #dbeafe;
    }

    .current-logo {
        max-width: 200px;
        max-height: 100px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
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

    .save-section {
        background: #f8fafc;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        margin-top: 25px;
        border: 1px solid #e2e8f0;
    }

    .row {
        margin-left: -10px;
        margin-right: -10px;
    }

    .row > * {
        padding-left: 10px;
        padding-right: 10px;
    }

    @media (max-width: 768px) {
        .navbar-control-container {
            padding: 20px;
            margin-bottom: 15px;
        }
        
        .section-header {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .navbar-preview {
            flex-direction: column;
            text-align: center;
            gap: 10px;
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
        <strong>Navbar Control Panel:</strong> Kelola tampilan navbar website Anda. 
        Perubahan akan langsung terlihat di seluruh halaman website setelah disimpan.
    </div>

    <!-- Preview Section -->
    <div class="preview-section">
        <h4 class="mb-3"><i class="fas fa-eye me-2"></i>Preview Navbar</h4>
        <div class="navbar-preview" id="navbarPreview">
            <!-- Brand Section -->
            <div class="d-flex align-items-center me-4" id="brandSection">
                <?php if($settings['navbar_show_logo'] == '1'): ?>
                    <img src="<?php echo e(asset($settings['navbar_logo'])); ?>" 
                         alt="Logo" 
                         class="preview-logo me-2" 
                         id="previewLogo"
                         style="height: <?php echo e($settings['navbar_logo_height']); ?>px; width: <?php echo e($settings['navbar_logo_width']); ?>;">
                <?php endif; ?>
                <?php if($settings['navbar_show_title'] == '1'): ?>
                    <span class="preview-title" id="previewTitle"><?php echo e($settings['navbar_title']); ?></span>
                <?php endif; ?>
            </div>
            
            <!-- Menu Section -->
            <div class="d-flex align-items-center gap-3 flex-wrap" id="menuSection">
                <span class="badge bg-primary" id="previewMenuHome"><?php echo e($settings['navbar_menu_home']); ?></span>
                <span class="badge bg-primary" id="previewMenuPortfolio"><?php echo e($settings['navbar_menu_portfolio']); ?></span>
                <span class="badge bg-primary" id="previewMenuAbout"><?php echo e($settings['navbar_menu_about']); ?></span>
                <span class="badge bg-primary" id="previewMenuContact"><?php echo e($settings['navbar_menu_contact']); ?></span>
                <span class="badge bg-secondary" id="previewMenuDashboard"><?php echo e($settings['navbar_menu_dashboard']); ?></span>
                <span class="badge bg-info text-dark" id="previewSearchPlaceholder">🔍 <?php echo e($settings['navbar_search_placeholder']); ?></span>
            </div>
        </div>
        <small class="text-muted mt-2 d-block">
            <i class="fas fa-lightbulb me-1"></i>
            Preview ini menunjukkan bagaimana navbar dan menu akan terlihat di website
        </small>
    </div>

    <div class="navbar-control-container">
        <form action="<?php echo e(route('admin.navbar.update')); ?>" method="POST" enctype="multipart/form-data" id="navbarForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Navbar Title Settings -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-heading"></i>
                    </div>
                    <h3 class="section-title">Pengaturan Judul Navbar</h3>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="form-label">Judul Navbar</label>
                            <input type="text" name="navbar_title" class="form-control" 
                                   value="<?php echo e($settings['navbar_title']); ?>" 
                                   id="navbarTitle" required>
                            <div class="form-text">Teks yang akan muncul di navbar sebagai nama brand/website</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Tampilkan Judul</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                       name="navbar_show_title" value="1" 
                                       id="showTitle" 
                                       <?php echo e($settings['navbar_show_title'] == '1' ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="showTitle">
                                    Ya, tampilkan judul di navbar
                                </label>
                            </div>
                            <div class="form-text">Centang untuk menampilkan judul di navbar</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navbar Menu Names Settings -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <h3 class="section-title">Pengaturan Nama Menu Navbar</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Menu Beranda</label>
                            <input type="text" name="navbar_menu_home" class="form-control" 
                                   value="<?php echo e($settings['navbar_menu_home']); ?>" 
                                   id="menuHome" required maxlength="50">
                            <div class="form-text">Nama yang ditampilkan untuk menu beranda</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Menu Portofolio</label>
                            <input type="text" name="navbar_menu_portfolio" class="form-control" 
                                   value="<?php echo e($settings['navbar_menu_portfolio']); ?>" 
                                   id="menuPortfolio" required maxlength="50">
                            <div class="form-text">Nama yang ditampilkan untuk menu portofolio</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Menu Tentang</label>
                            <input type="text" name="navbar_menu_about" class="form-control" 
                                   value="<?php echo e($settings['navbar_menu_about']); ?>" 
                                   id="menuAbout" required maxlength="50">
                            <div class="form-text">Nama yang ditampilkan untuk menu tentang</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Menu Kontak</label>
                            <input type="text" name="navbar_menu_contact" class="form-control" 
                                   value="<?php echo e($settings['navbar_menu_contact']); ?>" 
                                   id="menuContact" required maxlength="50">
                            <div class="form-text">Nama yang ditampilkan untuk menu kontak</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Menu Dashboard</label>
                            <input type="text" name="navbar_menu_dashboard" class="form-control" 
                                   value="<?php echo e($settings['navbar_menu_dashboard']); ?>" 
                                   id="menuDashboard" required maxlength="50">
                            <div class="form-text">Nama yang ditampilkan untuk menu dashboard admin</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Placeholder Pencarian</label>
                            <input type="text" name="navbar_search_placeholder" class="form-control" 
                                   value="<?php echo e($settings['navbar_search_placeholder']); ?>" 
                                   id="searchPlaceholder" required maxlength="100">
                            <div class="form-text">Teks placeholder untuk kolom pencarian</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navbar Logo Settings -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-image"></i>
                    </div>
                    <h3 class="section-title">Pengaturan Logo Navbar</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Logo Saat Ini</label>
                            <div class="text-center">
                                <img src="<?php echo e(asset($settings['navbar_logo'])); ?>" 
                                     alt="Current Logo" 
                                     class="current-logo"
                                     id="currentLogo">
                                <div class="form-text">Logo yang sedang digunakan di navbar</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Upload Logo Baru (Opsional)</label>
                            <div class="logo-upload-area" id="logoUploadArea">
                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                <p class="mb-2"><strong>Klik untuk memilih file</strong> atau drag & drop</p>
                                <p class="text-muted small mb-0">Format: JPG, PNG, GIF, SVG (Max: 2MB)</p>
                                <input type="file" name="navbar_logo_file" 
                                       class="form-control d-none" 
                                       id="logoFile" 
                                       accept="image/*">
                            </div>
                            <div class="form-text">Kosongkan jika tidak ingin mengubah logo</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Tampilkan Logo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                       name="navbar_show_logo" value="1" 
                                       id="showLogo" 
                                       <?php echo e($settings['navbar_show_logo'] == '1' ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="showLogo">
                                    Ya, tampilkan logo di navbar
                                </label>
                            </div>
                            <div class="form-text">Centang untuk menampilkan logo di navbar</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tinggi Logo (px)</label>
                                    <input type="number" name="navbar_logo_height" class="form-control" 
                                           value="<?php echo e($settings['navbar_logo_height']); ?>" 
                                           id="logoHeight" 
                                           min="20" max="200" required>
                                    <div class="form-text">Tinggi logo dalam pixel (20-200px)</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Lebar Logo</label>
                                    <input type="text" name="navbar_logo_width" class="form-control" 
                                           value="<?php echo e($settings['navbar_logo_width']); ?>" 
                                           id="logoWidth" 
                                           placeholder="auto">
                                    <div class="form-text">Lebar logo (auto, 100px, dll)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="save-section">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save me-2"></i>Simpan Pengaturan Navbar
                </button>
                <div class="mt-3">
                    <small class="text-muted">Perubahan akan langsung terlihat di navbar website</small>
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
    const navbarTitle = document.getElementById('navbarTitle');
    const showTitle = document.getElementById('showTitle');
    const showLogo = document.getElementById('showLogo');
    const logoHeight = document.getElementById('logoHeight');
    const logoWidth = document.getElementById('logoWidth');
    const logoFile = document.getElementById('logoFile');
    const logoUploadArea = document.getElementById('logoUploadArea');
    const currentLogo = document.getElementById('currentLogo');
    
    // Menu elements
    const menuHome = document.getElementById('menuHome');
    const menuPortfolio = document.getElementById('menuPortfolio');
    const menuAbout = document.getElementById('menuAbout');
    const menuContact = document.getElementById('menuContact');
    const menuDashboard = document.getElementById('menuDashboard');
    const searchPlaceholder = document.getElementById('searchPlaceholder');
    
    // Preview elements
    const previewTitle = document.getElementById('previewTitle');
    const previewLogo = document.getElementById('previewLogo');
    const brandSection = document.getElementById('brandSection');
    const menuSection = document.getElementById('menuSection');
    const previewMenuHome = document.getElementById('previewMenuHome');
    const previewMenuPortfolio = document.getElementById('previewMenuPortfolio');
    const previewMenuAbout = document.getElementById('previewMenuAbout');
    const previewMenuContact = document.getElementById('previewMenuContact');
    const previewMenuDashboard = document.getElementById('previewMenuDashboard');
    const previewSearchPlaceholder = document.getElementById('previewSearchPlaceholder');

    // Update preview function
    function updatePreview() {
        // Update brand section
        brandSection.innerHTML = '';
        
        // Add logo if enabled
        if (showLogo.checked) {
            const logoElement = document.createElement('img');
            logoElement.src = previewLogo ? previewLogo.src : currentLogo.src;
            logoElement.alt = 'Logo';
            logoElement.className = 'preview-logo me-2';
            logoElement.style.height = logoHeight.value + 'px';
            logoElement.style.width = logoWidth.value || 'auto';
            brandSection.appendChild(logoElement);
        }
        
        // Add title if enabled
        if (showTitle.checked) {
            const titleElement = document.createElement('span');
            titleElement.className = 'preview-title';
            titleElement.textContent = navbarTitle.value;
            brandSection.appendChild(titleElement);
        }
        
        // Show message if both brand elements are disabled
        if (!showTitle.checked && !showLogo.checked) {
            const messageElement = document.createElement('span');
            messageElement.className = 'text-muted';
            messageElement.innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i>Brand tidak ditampilkan';
            brandSection.appendChild(messageElement);
        }
        
        // Update menu names
        if (previewMenuHome) previewMenuHome.textContent = menuHome.value;
        if (previewMenuPortfolio) previewMenuPortfolio.textContent = menuPortfolio.value;
        if (previewMenuAbout) previewMenuAbout.textContent = menuAbout.value;
        if (previewMenuContact) previewMenuContact.textContent = menuContact.value;
        if (previewMenuDashboard) previewMenuDashboard.textContent = menuDashboard.value;
        if (previewSearchPlaceholder) previewSearchPlaceholder.textContent = '🔍 ' + searchPlaceholder.value;
    }

    // Event listeners for real-time preview
    navbarTitle.addEventListener('input', updatePreview);
    showTitle.addEventListener('change', updatePreview);
    showLogo.addEventListener('change', updatePreview);
    logoHeight.addEventListener('input', updatePreview);
    logoWidth.addEventListener('input', updatePreview);
    
    // Menu name event listeners
    menuHome.addEventListener('input', updatePreview);
    menuPortfolio.addEventListener('input', updatePreview);
    menuAbout.addEventListener('input', updatePreview);
    menuContact.addEventListener('input', updatePreview);
    menuDashboard.addEventListener('input', updatePreview);
    searchPlaceholder.addEventListener('input', updatePreview);

    // Logo upload handling
    logoUploadArea.addEventListener('click', function() {
        logoFile.click();
    });

    logoUploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('dragover');
    });

    logoUploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
    });

    logoUploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            logoFile.files = files;
            handleLogoPreview(files[0]);
        }
    });

    logoFile.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            handleLogoPreview(this.files[0]);
        }
    });

    function handleLogoPreview(file) {
        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('File harus berupa gambar!');
            return;
        }
        
        // Validate file size (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file maksimal 2MB!');
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            currentLogo.src = e.target.result;
            updatePreview();
        };
        reader.readAsDataURL(file);
    }

    // Form validation and loading state
    document.getElementById('navbarForm').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
        submitBtn.disabled = true;
    });

    // Initialize preview
    updatePreview();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/admin/navbar/index.blade.php ENDPATH**/ ?>