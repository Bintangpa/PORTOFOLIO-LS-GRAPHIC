<?php $__env->startSection('title', 'Pengaturan Akun - Admin'); ?>
<?php $__env->startSection('page-title', 'Pengaturan Akun'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .account-container {
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

    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 15px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus {
        border-color: #000099;
        box-shadow: 0 0 0 3px rgba(0, 0, 153, 0.1);
        background: white;
    }

    .form-control.is-invalid {
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
    }

    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 5px;
        font-size: 0.875rem;
        color: #dc2626;
        font-weight: 500;
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
        padding: 12px 30px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        box-shadow: 0 6px 15px rgba(0, 0, 153, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0000cc 0%, #000099 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 153, 0.4);
    }

    .btn-danger {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        border: none;
        border-radius: 12px;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        box-shadow: 0 6px 15px rgba(220, 38, 38, 0.3);
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #dc2626 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 38, 38, 0.4);
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

    .current-info {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 20px;
    }

    .current-info-label {
        font-weight: 600;
        color: #374151;
        font-size: 0.9rem;
    }

    .current-info-value {
        color: #1f2937;
        font-size: 1rem;
        margin-top: 5px;
    }

    .password-requirements {
        background: #f0f9ff;
        border: 1px solid #0ea5e9;
        border-radius: 10px;
        padding: 15px 20px;
        margin-top: 10px;
    }

    .password-requirements h6 {
        color: #0c4a6e;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .password-requirements ul {
        margin: 0;
        padding-left: 20px;
        color: #0c4a6e;
    }

    .password-requirements li {
        margin-bottom: 5px;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .account-container {
            padding: 20px;
            margin-bottom: 15px;
        }
        
        .section-header {
            flex-direction: column;
            text-align: center;
            gap: 15px;
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

    <!-- Security Notice -->
    <div class="alert alert-warning">
        <i class="fas fa-shield-alt me-2"></i>
        <strong>Keamanan Akun:</strong> Halaman ini untuk mengubah informasi akun administrator. 
        Pastikan menggunakan kata sandi yang kuat dan email yang valid.
    </div>

    <!-- Profile Information -->
    <div class="account-container">
        <div class="section-header">
            <div class="section-icon">
                <i class="fas fa-user"></i>
            </div>
            <h3 class="section-title">Informasi Profil</h3>
        </div>

        <form action="<?php echo e(route('admin.account.profile')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" 
                               value="<?php echo e(old('name', $user->name)); ?>" required>
                        <div class="form-text">Nama yang akan ditampilkan di dashboard admin</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" 
                               value="<?php echo e(old('email', $user->email)); ?>" required>
                        <div class="form-text">Email untuk login dan notifikasi</div>
                    </div>
                </div>
            </div>

            <div class="current-info">
                <div class="row">
                    <div class="col-md-6">
                        <div class="current-info-label">Nama Saat Ini:</div>
                        <div class="current-info-value"><?php echo e($user->name); ?></div>
                    </div>
                    <div class="col-md-6">
                        <div class="current-info-label">Email Saat Ini:</div>
                        <div class="current-info-value"><?php echo e($user->email); ?></div>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Perbarui Profil
                </button>
            </div>
        </form>
    </div>

    <!-- Change Password -->
    <div class="account-container">
        <div class="section-header">
            <div class="section-icon">
                <i class="fas fa-lock"></i>
            </div>
            <h3 class="section-title">Ubah Kata Sandi</h3>
        </div>

        <form action="<?php echo e(route('admin.account.password')); ?>" method="POST" id="passwordForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Kata Sandi Saat Ini</label>
                        <input type="password" name="current_password" class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-text">Masukkan kata sandi yang sedang digunakan</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Kata Sandi Baru</label>
                        <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-text">Kata sandi baru yang ingin digunakan</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" name="password_confirmation" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-text">Ulangi kata sandi baru untuk konfirmasi</div>
                    </div>
                </div>
            </div>

            <div class="password-requirements">
                <h6><i class="fas fa-info-circle me-2"></i>Persyaratan Kata Sandi:</h6>
                <ul>
                    <li>Minimal 8 karakter</li>
                    <li>Mengandung huruf</li>
                    <li>Mengandung minimal 1 angka</li>
                </ul>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-key me-2"></i>Ubah Kata Sandi
                </button>
            </div>
        </form>
    </div>

    <!-- Account Info -->
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Informasi:</strong> Setelah mengubah email atau kata sandi, Anda mungkin perlu login ulang. 
        Pastikan menyimpan informasi login yang baru dengan aman.
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Function to refresh CSRF token
    function refreshCSRFToken() {
        return fetch('/admin/csrf-token', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.token) {
                // Update all CSRF tokens on the page
                document.querySelectorAll('input[name="_token"]').forEach(input => {
                    input.value = data.token;
                });
                document.querySelector('meta[name="csrf-token"]')?.setAttribute('content', data.token);
                console.log('CSRF token refreshed:', data.token.substring(0, 10) + '...');
                return data.token;
            }
            return null;
        })
        .catch(error => {
            console.error('Failed to refresh CSRF token:', error);
            return null;
        });
    }

    // Form validation and loading state
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Prevent default submission temporarily
            e.preventDefault();
            
            // Debug logging for password form
            if (this.id === 'passwordForm') {
                console.log('Password form submitted');
                console.log('Form action:', this.action);
                console.log('Form method:', this.method);
                
                // Check if all required fields are filled
                const currentPassword = this.querySelector('input[name="current_password"]').value;
                const newPassword = this.querySelector('input[name="password"]').value;
                const confirmPassword = this.querySelector('input[name="password_confirmation"]').value;
                
                console.log('Current password filled:', currentPassword.length > 0);
                console.log('New password filled:', newPassword.length > 0);
                console.log('Confirm password filled:', confirmPassword.length > 0);
                console.log('Passwords match:', newPassword === confirmPassword);
                
                // Basic client-side validation
                if (newPassword.length < 8) {
                    alert('Kata sandi baru minimal 8 karakter');
                    e.preventDefault();
                    return false;
                }
                
                if (!/[a-zA-Z]/.test(newPassword)) {
                    alert('Kata sandi harus mengandung huruf');
                    e.preventDefault();
                    return false;
                }
                
                if (!/\d/.test(newPassword)) {
                    alert('Kata sandi harus mengandung angka');
                    e.preventDefault();
                    return false;
                }
                
                if (newPassword !== confirmPassword) {
                    alert('Konfirmasi kata sandi tidak cocok');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    return false;
                }
            }
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
            submitBtn.disabled = true;
            
            // Try to refresh CSRF token before submission
            const formElement = this;
            refreshCSRFToken().then((newToken) => {
                if (newToken) {
                    console.log('Submitting form with fresh CSRF token');
                } else {
                    console.log('CSRF refresh failed, using existing token');
                }
                formElement.submit();
            }).catch(error => {
                console.error('CSRF refresh failed, submitting with existing token:', error);
                formElement.submit();
            });
            
            // Re-enable button after 10 seconds in case of error
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 10000);
        });
    });
    
    // Clear password form after successful submission
    <?php if(session('success') && str_contains(session('success'), 'kata sandi')): ?>
        // Clear password form fields
        const passwordForm = document.querySelector('form[action*="password"]');
        if (passwordForm) {
            passwordForm.reset();
        }
    <?php endif; ?>

    // Password strength indicator
    const passwordInput = document.querySelector('input[name="password"]');
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const requirements = document.querySelectorAll('.password-requirements li');
            
            // Check each requirement
            const checks = [
                password.length >= 8,
                /[a-zA-Z]/.test(password),
                /\d/.test(password)
            ];
            
            requirements.forEach((req, index) => {
                if (checks[index]) {
                    req.style.color = '#059669';
                    req.innerHTML = '<i class="fas fa-check me-1"></i>' + req.textContent.replace('✓ ', '');
                } else {
                    req.style.color = '#dc2626';
                    req.innerHTML = '<i class="fas fa-times me-1"></i>' + req.textContent.replace('✗ ', '');
                }
            });
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/admin/account/index.blade.php ENDPATH**/ ?>