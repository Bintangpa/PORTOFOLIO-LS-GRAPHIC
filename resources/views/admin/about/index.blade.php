@extends('layouts.admin')

@section('title', 'Kelola Halaman Tentang - Admin')
@section('page-title', 'Kelola Halaman Tentang')

@section('styles')
<style>
    .section-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    
    .section-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }
    
    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e2e8f0;
    }
    
    .section-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: white;
        font-size: 1.2rem;
    }
    
    .section-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
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
    
    .form-control, .form-textarea {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .form-control:focus, .form-textarea:focus {
        border-color: #000099;
        box-shadow: 0 0 0 0.2rem rgba(0, 0, 153, 0.25);
        outline: none;
    }
    
    .form-textarea {
        min-height: 100px;
        resize: vertical;
        font-family: inherit;
    }
    
    .form-text {
        font-size: 0.85rem;
        color: #6b7280;
        margin-top: 5px;
    }
    
    .values-grid, .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 15px;
    }
    
    .value-item, .service-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 20px;
    }
    
    .item-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .item-icon {
        width: 35px;
        height: 35px;
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
        color: white;
        font-size: 0.9rem;
    }
    
    .item-number {
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        color: white;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 700;
        margin-right: 10px;
    }
    
    .save-section {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        border: 2px solid #e2e8f0;
        margin-top: 30px;
    }
    
    .btn-save {
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        border: none;
        color: white;
        padding: 15px 40px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 153, 0.3);
    }
    
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 153, 0.4);
        color: white;
    }
    
    .btn-preview {
        background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
        border: none;
        color: white;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-right: 15px;
    }
    
    .btn-preview:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(107, 114, 128, 0.3);
        color: white;
    }
    
    @media (max-width: 768px) {
        .values-grid, .services-grid {
            grid-template-columns: 1fr;
        }
        
        .section-card {
            padding: 20px;
        }
        
        .btn-preview {
            margin-right: 0;
            margin-bottom: 10px;
            width: 100%;
        }
        
        .btn-save {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<form action="{{ route('admin.about.update') }}" method="POST">
    @csrf
    
    <!-- Hero Section -->
    <div class="section-card">
        <div class="section-header">
            <div class="section-icon">
                <i class="fas fa-home"></i>
            </div>
            <h3 class="section-title">Hero Section</h3>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Judul Hero</label>
                    <input type="text" name="settings[about_hero_title]" class="form-control" 
                           value="{{ $settings['about_hero_title'] }}" required>
                    <div class="form-text">Judul utama di bagian atas halaman tentang</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Deskripsi Hero</label>
                    <textarea name="settings[about_hero_description]" class="form-textarea" rows="4" required>{{ $settings['about_hero_description'] }}</textarea>
                    <div class="form-text">Deskripsi singkat tentang perusahaan</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Vision & Mission -->
    <div class="section-card">
        <div class="section-header">
            <div class="section-icon">
                <i class="fas fa-eye"></i>
            </div>
            <h3 class="section-title">Visi & Misi</h3>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Judul Visi</label>
                    <input type="text" name="settings[about_vision_title]" class="form-control" 
                           value="{{ $settings['about_vision_title'] }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Konten Visi</label>
                    <textarea name="settings[about_vision_content]" class="form-textarea" rows="4" required>{{ $settings['about_vision_content'] }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Judul Misi</label>
                    <input type="text" name="settings[about_mission_title]" class="form-control" 
                           value="{{ $settings['about_mission_title'] }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Konten Misi</label>
                    <textarea name="settings[about_mission_content]" class="form-textarea" rows="4" required>{{ $settings['about_mission_content'] }}</textarea>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Values Section -->
    <div class="section-card">
        <div class="section-header">
            <div class="section-icon">
                <i class="fas fa-heart"></i>
            </div>
            <h3 class="section-title">Nilai-Nilai Perusahaan</h3>
        </div>
        
        <div class="form-group">
            <label class="form-label">Judul Section Nilai</label>
            <input type="text" name="settings[about_values_title]" class="form-control" 
                   value="{{ $settings['about_values_title'] }}" required>
        </div>
        
        <div class="values-grid">
            <div class="value-item">
                <div class="item-header">
                    <div class="item-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <strong>Nilai 1</strong>
                </div>
                <div class="form-group">
                    <label class="form-label">Judul</label>
                    <input type="text" name="settings[about_value1_title]" class="form-control" 
                           value="{{ $settings['about_value1_title'] }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="settings[about_value1_content]" class="form-textarea" rows="3" required>{{ $settings['about_value1_content'] }}</textarea>
                </div>
            </div>
            
            <div class="value-item">
                <div class="item-header">
                    <div class="item-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <strong>Nilai 2</strong>
                </div>
                <div class="form-group">
                    <label class="form-label">Judul</label>
                    <input type="text" name="settings[about_value2_title]" class="form-control" 
                           value="{{ $settings['about_value2_title'] }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="settings[about_value2_content]" class="form-textarea" rows="3" required>{{ $settings['about_value2_content'] }}</textarea>
                </div>
            </div>
            
            <div class="value-item">
                <div class="item-header">
                    <div class="item-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <strong>Nilai 3</strong>
                </div>
                <div class="form-group">
                    <label class="form-label">Judul</label>
                    <input type="text" name="settings[about_value3_title]" class="form-control" 
                           value="{{ $settings['about_value3_title'] }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="settings[about_value3_content]" class="form-textarea" rows="3" required>{{ $settings['about_value3_content'] }}</textarea>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Services Section -->
    <div class="section-card">
        <div class="section-header">
            <div class="section-icon">
                <i class="fas fa-cogs"></i>
            </div>
            <h3 class="section-title">Layanan Kami</h3>
        </div>
        
        <div class="form-group">
            <label class="form-label">Judul Section Layanan</label>
            <input type="text" name="settings[about_services_title]" class="form-control" 
                   value="{{ $settings['about_services_title'] }}" required>
        </div>
        
        <div class="services-grid">
            <div class="service-item">
                <div class="item-header">
                    <div class="item-number">1</div>
                    <strong>Layanan 1</strong>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Layanan</label>
                    <input type="text" name="settings[about_service1_title]" class="form-control" 
                           value="{{ $settings['about_service1_title'] }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="settings[about_service1_content]" class="form-textarea" rows="3" required>{{ $settings['about_service1_content'] }}</textarea>
                </div>
            </div>
            
            <div class="service-item">
                <div class="item-header">
                    <div class="item-number">2</div>
                    <strong>Layanan 2</strong>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Layanan</label>
                    <input type="text" name="settings[about_service2_title]" class="form-control" 
                           value="{{ $settings['about_service2_title'] }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="settings[about_service2_content]" class="form-textarea" rows="3" required>{{ $settings['about_service2_content'] }}</textarea>
                </div>
            </div>
            
            <div class="service-item">
                <div class="item-header">
                    <div class="item-number">3</div>
                    <strong>Layanan 3</strong>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Layanan</label>
                    <input type="text" name="settings[about_service3_title]" class="form-control" 
                           value="{{ $settings['about_service3_title'] }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="settings[about_service3_content]" class="form-textarea" rows="3" required>{{ $settings['about_service3_content'] }}</textarea>
                </div>
            </div>
            
            <div class="service-item">
                <div class="item-header">
                    <div class="item-number">4</div>
                    <strong>Layanan 4</strong>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Layanan</label>
                    <input type="text" name="settings[about_service4_title]" class="form-control" 
                           value="{{ $settings['about_service4_title'] }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="settings[about_service4_content]" class="form-textarea" rows="3" required>{{ $settings['about_service4_content'] }}</textarea>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="section-card">
        <div class="section-header">
            <div class="section-icon">
                <i class="fas fa-bullhorn"></i>
            </div>
            <h3 class="section-title">Call to Action</h3>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Judul CTA</label>
                    <input type="text" name="settings[about_cta_title]" class="form-control" 
                           value="{{ $settings['about_cta_title'] }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Deskripsi CTA</label>
                    <textarea name="settings[about_cta_description]" class="form-textarea" rows="3" required>{{ $settings['about_cta_description'] }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Teks Tombol</label>
                    <input type="text" name="settings[about_cta_button_text]" class="form-control" 
                           value="{{ $settings['about_cta_button_text'] }}" required>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Save Section -->
    <div class="save-section">
        <h4 class="mb-3">Simpan Perubahan</h4>
        <p class="text-muted mb-4">Pastikan semua informasi sudah benar sebelum menyimpan perubahan.</p>
        <div class="d-flex justify-content-center flex-wrap">
            <a href="{{ route('about') }}" target="_blank" class="btn btn-preview">
                <i class="fas fa-eye me-2"></i>Preview Halaman
            </a>
            <button type="submit" class="btn btn-save">
                <i class="fas fa-save me-2"></i>Simpan Semua Perubahan
            </button>
        </div>
    </div>
</form>
@endsection