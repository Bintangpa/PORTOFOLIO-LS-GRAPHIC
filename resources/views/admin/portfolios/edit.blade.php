@extends('layouts.admin')

@section('title', 'Edit Portfolio - Admin')
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
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit"></i> Edit Portfolio: {{ $portfolio->title }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Portfolio <span class="text-danger">*</span></label>
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
                                        <label for="category" class="form-label">Kategori</label>
                                        <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                               id="category" name="category" value="{{ old('category', $portfolio->category) }}" 
                                               placeholder="Contoh: Logo Design, Web Design">
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
                                <label class="form-label">Gambar Portfolio Saat Ini</label>
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
                                <small class="text-muted d-block mt-2">Format: JPG, JPEG, PNG, GIF (Max: 2MB)</small>
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Portfolio
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
</script>
@endsection