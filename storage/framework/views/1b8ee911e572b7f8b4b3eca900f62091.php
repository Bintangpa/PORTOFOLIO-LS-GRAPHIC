

<?php $__env->startSection('title', $portfolio->title . ' - ' . \App\Models\WebsiteSetting::getValue('site_name', 'LittleStar Studio')); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .detail-image {
        width: 100%;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        margin-bottom: 30px;
    }
    .detail-info {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 20px;
    }
    .detail-info h6 {
        color: #1e3a8a;
        font-weight: 600;
        margin-bottom: 5px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="content-wrapper">
        <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-secondary mb-4">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        
        <h1 class="mb-4"><?php echo e($portfolio->title); ?></h1>
        
        <div class="row">
            <div class="col-md-8">
                <img src="<?php echo e(asset('storage/' . $portfolio->image_path)); ?>" alt="<?php echo e($portfolio->title); ?>" class="detail-image">
            </div>
            
            <div class="col-md-4">
                <?php if($portfolio->category): ?>
                    <div class="detail-info">
                        <h6>Kategori</h6>
                        <p class="mb-0"><?php echo e($portfolio->category); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if($portfolio->client): ?>
                    <div class="detail-info">
                        <h6>Klien</h6>
                        <p class="mb-0"><?php echo e($portfolio->client); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if($portfolio->project_date): ?>
                    <div class="detail-info">
                        <h6>Tanggal Project</h6>
                        <p class="mb-0"><?php echo e($portfolio->project_date->format('d M Y')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="mt-4">
            <h4>Deskripsi</h4>
            <p style="white-space: pre-line;"><?php echo e($portfolio->description); ?></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\littlestar-std\resources\views/portfolio-detail.blade.php ENDPATH**/ ?>