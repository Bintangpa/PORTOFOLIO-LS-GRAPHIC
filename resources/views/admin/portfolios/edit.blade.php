@extends('layouts.admin')

@section('title', 'Edit Portofolio - Admin')
@section('page-title', 'Dashboard Admin')

@section('styles')
<style>
    .preview-image {
        max-width: 100%;
        max-height: 400px;
        border-radius: 10px;
        margin-top: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .form-label {
        font-weight: 600;
        color: #333;
    }
    .card-header {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
        font-weight: 600;
    }
    .current-image {
        position: relative;
    }
    .change-image-label {
        background: rgba(0,0,0,0.6);
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        display: inline-block;
        margin-top: 10px;
    }
    .change-image-label:hover {
        background: rgba(0,0,0,0.8);
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
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit"></i> Edit Portofolio: {{ $portfolio->title }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Portofolio <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $portfolio->title) }}" 
                                       placeholder="Contoh: Logo Design untuk Brand ABC" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="6" 
                                          placeholder="Jelaskan detail tentang project ini..." required>{{ old('description', $portfolio->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category_select" class="form-label">Kategori</label>
                                        <select class="form-select @error('category') is-invalid @enderror" 
                                                id="category_select" name="category_select" onchange="toggleCustomCategory()">
                                            <option value="">Pilih Kategori...</option>
                                            <option value="LOGO DESIGN" {{ (old('category_select') ?? $portfolio->category) == 'LOGO DESIGN' ? 'selected' : '' }}>LOGO DESIGN</option>
                                            <option value="POSTER DESIGN" {{ (old('category_select') ?? $portfolio->category) == 'POSTER DESIGN' ? 'selected' : '' }}>POSTER DESIGN</option>
                                            <option value="COMMISSION DESIGN" {{ (old('category_select') ?? $portfolio->category) == 'COMMISSION DESIGN' ? 'selected' : '' }}>COMMISSION DESIGN</option>
                                            <option value="PERSONAL USE DESIGN" {{ (old('category_select') ?? $portfolio->category) == 'PERSONAL USE DESIGN' ? 'selected' : '' }}>PERSONAL USE DESIGN</option>
                                            <option value="LAINNYA" {{ !in_array((old('category_select') ?? $portfolio->category), ['LOGO DESIGN', 'POSTER DESIGN', 'COMMISSION DESIGN', 'PERSONAL USE DESIGN']) && !empty($portfolio->category) ? 'selected' : '' }}>LAINNYA</option>
                                        </select>
                                        
                                        <!-- Custom Category Input (Hidden by default) -->
                                        <div id="custom_category_wrapper" class="mt-2" style="display: none;">
                                            <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                                   id="custom_category" name="custom_category" 
                                                   value="{{ !in_array($portfolio->category, ['LOGO DESIGN', 'POSTER DESIGN', 'COMMISSION DESIGN', 'PERSONAL USE DESIGN']) ? $portfolio->category : '' }}" 
                                                   placeholder="Masukkan kategori custom...">
                                        </div>
                                        
                                        <!-- Hidden input to store final category value -->
                                        <input type="hidden" id="category" name="category" value="{{ old('category', $portfolio->category) }}">
                                        
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="client" class="form-label">Nama Klien</label>
                                        <input type="text" class="form-control @error('client') is-invalid @enderror" 
                                               id="client" name="client" value="{{ old('client', $portfolio->client) }}" 
                                               placeholder="Contoh: PT. ABC Indonesia">
                                        @error('client')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="project_date" class="form-label">Tanggal Project</label>
                                <input type="date" class="form-control @error('project_date') is-invalid @enderror" 
                                       id="project_date" name="project_date" 
                                       value="{{ old('project_date', $portfolio->project_date ? $portfolio->project_date->format('Y-m-d') : '') }}">
                                @error('project_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Gambar Portofolio Saat Ini</label>
                                <div class="current-image">
                                    <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                                         class="preview-image" id="currentImage" alt="{{ $portfolio->title }}">
                                </div>
                                
                                <label for="image" class="change-image-label mt-3">
                                    <i class="fas fa-camera"></i> Ganti Gambar
                                </label>
                                <input type="file" class="form-control d-none @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*" onchange="previewImage(event)">
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted d-block mt-2">Format: JPG, JPEG, PNG, GIF (Max: 15MB)</small>
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                
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
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Portofolio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        const reader = new FileReader();
        const preview = document.getElementById('currentImage');
        
        reader.onload = function() {
            preview.src = reader.result;
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
            // Set the hidden input to the current custom value
            hiddenCategoryInput.value = customCategoryInput.value;
        } else {
            customCategoryWrapper.style.display = 'none';
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
    
    document.addEventListener('DOMContentLoaded', function() {
        const customCategoryInput = document.getElementById('custom_category');
        const form = document.querySelector('form');
        
        // Initialize category on page load
        toggleCustomCategory();
        
        // Add event listener for custom category input
        customCategoryInput.addEventListener('input', updateCategoryValue);
        
        // Add event listener for form submission
        form.addEventListener('submit', function(e) {
            updateCategoryValue(); // Ensure category value is updated before submission
            
            // Show loading state on submit button
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
                submitBtn.disabled = true;
            }
        });
    });
</script>
@endsection