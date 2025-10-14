

<?php $__env->startSection('title', 'Tambah Portofolio - Admin'); ?>
<?php $__env->startSection('page-title', 'Dashboard Admin'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .preview-image {
        max-width: 100%;
        max-height: 250px;
        border-radius: 12px;
        margin-top: 10px;
        display: none;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        transition: all 0.3s ease;
    }
    
    .preview-image:hover {
        transform: scale(1.02);
        box-shadow: 0 12px 35px rgba(0,0,0,0.2);
    }
    
    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }
    
    .form-control, .form-select {
        padding: 0.6rem 1rem;
        font-size: 0.9rem;
        border-radius: 10px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #1e3a8a;
        box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25);
    }
    
    .compact-form {
        max-height: calc(100vh - 140px);
        overflow-y: auto;
        margin: 20px;
        padding: 20px;
    }
    
    .compact-card {
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border: none;
    }
    
    .compact-card .card-body {
        padding: 2.5rem;
    }
    
    .mb-compact {
        margin-bottom: 1.25rem !important;
    }
    
    .row-compact {
        margin-bottom: 0.75rem;
    }
    
    .upload-area {
        border: 2px dashed #e9ecef;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    
    .upload-area:hover {
        border-color: #1e3a8a;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        transform: translateY(-2px);
    }
    
    .upload-area.dragover {
        border-color: #1e3a8a;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    }
    
    .upload-icon {
        font-size: 2.5rem;
        color: #6b7280;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .upload-area:hover .upload-icon {
        color: #1e3a8a;
        transform: scale(1.1);
    }
    
    .upload-text {
        color: #6b7280;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .upload-hint {
        color: #9ca3af;
        font-size: 0.8rem;
    }
    
    .btn-action {
        padding: 1rem 2.5rem;
        font-weight: 700;
        border-radius: 15px;
        transition: all 0.3s ease;
        min-width: 180px;
        text-align: center;
        font-size: 1rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .btn-action:active {
        transform: translateY(-1px);
        transition: all 0.1s ease;
    }
    
    .btn-outline-secondary {
        border: 3px solid #dc2626;
        color: #dc2626;
        background: transparent;
        position: relative;
        overflow: hidden;
        transform: translateY(-5px);
    }
    
    .btn-outline-secondary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(220, 38, 38, 0.1), transparent);
        transition: left 0.5s ease;
    }
    
    .btn-outline-secondary:hover::before {
        left: 100%;
    }
    
    .btn-outline-secondary:hover {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        border-color: #dc2626;
        color: white;
        box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
        transform: translateY(-8px);
    }
    
    .btn-outline-secondary:active {
        transform: translateY(-3px);
        transition: all 0.1s ease;
    }
    
    .btn-primary.btn-action {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        border: none;
        color: white;
        position: relative;
        overflow: hidden;
        transform: translateY(-5px);
    }
    
    .btn-primary.btn-action::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    
    .btn-primary.btn-action:hover::before {
        left: 100%;
    }
    
    .btn-primary.btn-action:hover {
        background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        transform: translateY(-8px);
    }
    
    .btn-primary.btn-action:active {
        transform: translateY(-3px);
        transition: all 0.1s ease;
    }
    
    .btn-danger.btn-action {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        border: none;
        color: white;
        position: relative;
        overflow: hidden;
        transform: translateY(-5px);
    }
    
    .btn-danger.btn-action::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    
    .btn-danger.btn-action:hover::before {
        left: 100%;
    }
    
    .btn-danger.btn-action:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
        transform: translateY(-8px);
    }
    
    .btn-danger.btn-action:active {
        transform: translateY(-3px);
        transition: all 0.1s ease;
    }
    
    .action-buttons {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 2rem 2.5rem 2.5rem 2.5rem;
        border-radius: 0 0 20px 20px;
        border-top: 1px solid #e9ecef;
        margin: -30px -2.5rem -2.5rem -2.5rem;
        position: relative;
        z-index: 2;
    }
    
    .action-buttons .position-relative {
        width: 100%;
        height: 60px;
    }
    
    .action-buttons .position-absolute {
        top: 50%;
    }
    
    .action-buttons .btn-danger {
        transform: translateY(-50%) translateY(-5px);
    }
    
    .action-buttons .btn-danger:hover {
        transform: translateY(-50%) translateY(-8px);
    }
    
    .action-buttons .btn-danger:active {
        transform: translateY(-50%) translateY(-3px);
    }
    
    .action-buttons .btn-primary {
        transform: translateY(-50%) translateY(-5px);
    }
    
    .action-buttons .btn-primary:hover {
        transform: translateY(-50%) translateY(-8px);
    }
    
    .action-buttons .btn-primary:active {
        transform: translateY(-50%) translateY(-3px);
    }
    
    .action-buttons .start-0 {
        left: 40px !important;
    }
    
    .action-buttons .end-0 {
        right: 40px !important;
    }
    
    .required-asterisk {
        color: #dc2626;
        font-weight: 700;
    }
    
    .upload-notes .alert-info {
        background: linear-gradient(135deg, #e0f2fe 0%, #b3e5fc 100%);
        border: 2px solid #29b6f6;
        border-radius: 12px;
        color: #01579b;
        font-size: 0.9rem;
    }
    
    .upload-notes .alert-info h6 {
        color: #0277bd;
        font-weight: 700;
        font-size: 0.95rem;
    }
    
    .upload-notes .alert-info ul {
        list-style-type: none;
        padding-left: 0;
    }
    
    .upload-notes .alert-info li {
        position: relative;
        padding-left: 1.5rem;
        line-height: 1.5;
    }
    
    .upload-notes .alert-info li::before {
        content: '\2022';
        color: #0288d1;
        font-weight: bold;
        position: absolute;
        left: 0;
        top: 0;
        font-size: 1.2rem;
    }
    
    /* Force button positioning */
    .action-buttons .position-absolute.start-0 {
        left: 40px !important;
        margin-left: 0 !important;
    }
    
    .action-buttons .position-absolute.end-0 {
        right: 40px !important;
        margin-right: 0 !important;
    }
    
    .action-buttons .position-absolute.end-0 {
        right: 50px !important;
        margin-right: 0 !important;
    }
    
    /* Responsive Margins */
    @media (max-width: 768px) {
        .compact-form {
            margin: 10px;
            padding: 15px;
        }
        
        .compact-card .card-body {
            padding: 1.5rem;
        }
        
        .upload-area {
            padding: 1.5rem;
        }
        
        .action-buttons {
            padding: 1.5rem 1.5rem 2rem 1.5rem;
            margin: -20px -1.5rem -1.5rem -1.5rem;
        }
        
        .mb-compact {
            margin-bottom: 1rem !important;
        }
        
        .btn-action {
            padding: 0.875rem 1.5rem;
            min-width: 140px;
            font-size: 0.9rem;
        }
        
        .action-buttons .position-relative {
            height: 50px;
        }
        
        .action-buttons .start-0 {
            left: 30px !important;
        }
        
        .action-buttons .end-0 {
            right: 30px !important;
        }
        
        /* Force mobile button positioning */
        .action-buttons .position-absolute.start-0 {
            left: 30px !important;
            margin-left: 0 !important;
        }
        
        .action-buttons .position-absolute.end-0 {
            right: 30px !important;
            margin-right: 0 !important;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="compact-form">
    <div class="card compact-card">
        <div class="card-body">
            <form id="portfolioForm" action="<?php echo e(route('admin.portfolios.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                
                <div class="row">
                    <!-- Left Column - Form Fields -->
                    <div class="col-lg-7">
                        <!-- Title -->
                        <div class="mb-compact">
                            <label for="title" class="form-label">
                                <i class="fas fa-heading me-1"></i>
                                Judul Portofolio <span class="required-asterisk">*</span>
                            </label>
                            <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="title" name="title" value="<?php echo e(old('title')); ?>" 
                                   placeholder="Masukkan judul portofolio..." required>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <!-- Description -->
                        <div class="mb-compact">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left me-1"></i>
                                Deskripsi <span class="required-asterisk">*</span>
                            </label>
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="description" name="description" rows="4" 
                                      placeholder="Jelaskan detail tentang project ini..." required><?php echo e(old('description')); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <!-- Category and Client Row -->
                        <div class="row row-compact">
                            <div class="col-md-6">
                                <div class="mb-compact">
                                    <label for="category_select" class="form-label">
                                        <i class="fas fa-tag me-1"></i>
                                        Kategori
                                    </label>
                                    <select class="form-select <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            id="category_select" name="category_select" onchange="toggleCustomCategory()">
                                        <option value="">Pilih Kategori...</option>
                                        <option value="LOGO DESIGN" <?php echo e(old('category_select') == 'LOGO DESIGN' ? 'selected' : ''); ?>>LOGO DESIGN</option>
                                        <option value="POSTER DESIGN" <?php echo e(old('category_select') == 'POSTER DESIGN' ? 'selected' : ''); ?>>POSTER DESIGN</option>
                                        <option value="COMMISSION DESIGN" <?php echo e(old('category_select') == 'COMMISSION DESIGN' ? 'selected' : ''); ?>>COMMISSION DESIGN</option>
                                        <option value="PERSONAL USE DESIGN" <?php echo e(old('category_select') == 'PERSONAL USE DESIGN' ? 'selected' : ''); ?>>PERSONAL USE DESIGN</option>
                                        <option value="LAINNYA" <?php echo e(old('category_select') == 'LAINNYA' ? 'selected' : ''); ?>>LAINNYA</option>
                                    </select>
                                    
                                    <!-- Custom Category Input (Hidden by default) -->
                                    <div id="custom_category_wrapper" class="mt-2" style="display: none;">
                                        <input type="text" class="form-control <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="custom_category" name="custom_category" value="<?php echo e(old('custom_category')); ?>" 
                                               placeholder="Masukkan kategori custom...">
                                    </div>
                                    
                                    <!-- Hidden input to store final category value -->
                                    <input type="hidden" id="category" name="category" value="<?php echo e(old('category')); ?>">
                                    
                                    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-compact">
                                    <label for="client" class="form-label">
                                        <i class="fas fa-user-tie me-1"></i>
                                        Nama Klien
                                    </label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['client'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="client" name="client" value="<?php echo e(old('client')); ?>" 
                                           placeholder="PT. ABC Indonesia...">
                                    <?php $__errorArgs = ['client'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Project Date -->
                        <div class="mb-compact">
                            <label for="project_date" class="form-label">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal Project
                            </label>
                            <input type="date" class="form-control <?php $__errorArgs = ['project_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="project_date" name="project_date" value="<?php echo e(old('project_date')); ?>">
                            <?php $__errorArgs = ['project_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    
                    <!-- Right Column - Image Upload -->
                    <div class="col-lg-5">
                        <div class="mb-compact">
                            <label class="form-label">
                                <i class="fas fa-image me-1"></i>
                                Gambar Portofolio <span class="required-asterisk">*</span>
                            </label>
                            
                            <div class="upload-area" onclick="document.getElementById('image').click()">
                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="upload-text">Klik untuk upload gambar</div>
                                <div class="upload-hint">JPG, PNG, GIF (Max: 15MB)</div>
                                
                                <input type="file" class="d-none <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="image" name="image" accept="image/*" required onchange="previewImage(event)">
                            </div>
                            
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            
                            <!-- Upload Notes -->
                            <div class="upload-notes mt-3">
                                <div class="alert alert-info p-3 mb-0">
                                    <h6 class="mb-2"><i class="fas fa-info-circle me-2"></i>Catatan Penting:</h6>
                                    <ul class="mb-0 ps-3">
                                        <li class="mb-1">Batas ukuran gambar yang dapat diunggah adalah <strong>15 MB</strong>.</li>
                                        <li class="mb-0">Gambar yang di upload harus memiliki rasio ukuran <strong>4:3</strong>.</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <img id="preview" class="preview-image" alt="Preview">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Action Buttons -->
        <div class="action-buttons">
            <div class="d-flex justify-content-center align-items-center position-relative">
                <div class="position-absolute start-0">
                    <a href="<?php echo e(route('admin.portfolios.index')); ?>" class="btn btn-danger btn-action">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
                <div class="position-absolute end-0">
                    <button type="submit" form="portfolioForm" class="btn btn-primary btn-action">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Portofolio
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        const preview = document.getElementById('preview');
        const uploadArea = document.querySelector('.upload-area');
        
        reader.onload = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
            uploadArea.style.display = 'none';
        }
        
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
    
    function toggleCustomCategory() {
        const categorySelect = document.getElementById('category_select');
        const customCategoryWrapper = document.getElementById('custom_category_wrapper');
        const customCategoryInput = document.getElementById('custom_category');
        const hiddenCategoryInput = document.getElementById('category');
        
        if (categorySelect.value === 'LAINNYA') {
            customCategoryWrapper.style.display = 'block';
            customCategoryInput.focus();
            // Clear the hidden input when switching to custom
            hiddenCategoryInput.value = '';
        } else {
            customCategoryWrapper.style.display = 'none';
            customCategoryInput.value = '';
            // Set the hidden input to the selected predefined category
            hiddenCategoryInput.value = categorySelect.value;
        }
    }
    
    // Update hidden category input when custom category is typed
    function updateCategoryValue() {
        const categorySelect = document.getElementById('category_select');
        const customCategoryInput = document.getElementById('custom_category');
        const hiddenCategoryInput = document.getElementById('category');
        
        if (categorySelect.value === 'LAINNYA') {
            hiddenCategoryInput.value = customCategoryInput.value;
        } else {
            hiddenCategoryInput.value = categorySelect.value;
        }
    }
    
    // Drag and Drop functionality
    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.querySelector('.upload-area');
        const fileInput = document.getElementById('image');
        const customCategoryInput = document.getElementById('custom_category');
        const portfolioForm = document.getElementById('portfolioForm');
        
        // Initialize category on page load
        toggleCustomCategory();
        
        // Add event listener for custom category input
        customCategoryInput.addEventListener('input', updateCategoryValue);
        
        // Add event listener for form submission
        portfolioForm.addEventListener('submit', function(e) {
            updateCategoryValue(); // Ensure category value is updated before submission
            
            // Show loading state on submit button
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
                submitBtn.disabled = true;
            }
        });
        
        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });
        
        // Highlight drop area when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });
        
        // Handle dropped files
        uploadArea.addEventListener('drop', handleDrop, false);
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        function highlight(e) {
            uploadArea.classList.add('dragover');
        }
        
        function unhighlight(e) {
            uploadArea.classList.remove('dragover');
        }
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                fileInput.files = files;
                previewImage({ target: { files: files } });
            }
        }
        
        // Reset preview when clicking on preview image
        document.getElementById('preview').addEventListener('click', function() {
            this.style.display = 'none';
            uploadArea.style.display = 'block';
            fileInput.value = '';
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/admin/portfolios/create.blade.php ENDPATH**/ ?>