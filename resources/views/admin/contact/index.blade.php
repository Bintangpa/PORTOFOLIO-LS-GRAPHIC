@extends('layouts.admin')

@section('title', 'Kontak Control - Admin')
@section('page-title', 'Kontak Control')

@section('styles')
<style>
    .contact-form-container {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
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
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        margin-top: 30px;
    }

    @media (max-width: 768px) {
        .contact-form-container {
            padding: 25px;
        }
        
        .section-header {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Alerts -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="contact-form-container">
        <form action="{{ route('admin.contact.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Informasi Dasar -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h3 class="section-title">Informasi Dasar</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" name="settings[company_name]" class="form-control" 
                                   value="{{ $settings['company_name'] }}" required>
                            <div class="form-text">Nama perusahaan atau studio Anda</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Tagline</label>
                            <input type="text" name="settings[company_tagline]" class="form-control" 
                                   value="{{ $settings['company_tagline'] }}">
                            <div class="form-text">Slogan atau tagline perusahaan</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email Kontak</label>
                            <input type="email" name="settings[contact_email]" class="form-control" 
                                   value="{{ $settings['contact_email'] }}" required>
                            <div class="form-text">Email utama untuk kontak</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" name="settings[contact_phone]" class="form-control" 
                                   value="{{ $settings['contact_phone'] }}" required>
                            <div class="form-text">Nomor telepon utama</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">WhatsApp</label>
                            <input type="text" name="settings[contact_whatsapp]" class="form-control" 
                                   value="{{ $settings['contact_whatsapp'] }}">
                            <div class="form-text">Nomor WhatsApp untuk kontak cepat</div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Jam Operasional -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="section-title">Jam Operasional</h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Jadwal Operasional</label>
                            <textarea name="settings[operating_hours]" class="form-control" rows="4" required>{{ $settings['operating_hours'] }}</textarea>
                            <div class="form-text">Tulis jadwal operasional lengkap, satu hari per baris</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Media Sosial -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h3 class="section-title">Media Sosial</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Instagram</label>
                            <input type="url" name="settings[social_instagram]" class="form-control" 
                                   value="{{ $settings['social_instagram'] }}">
                            <div class="form-text">URL halaman Instagram</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Facebook</label>
                            <input type="url" name="settings[social_facebook]" class="form-control" 
                                   value="{{ $settings['social_facebook'] }}">
                            <div class="form-text">URL halaman Facebook</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Twitter</label>
                            <input type="url" name="settings[social_twitter]" class="form-control" 
                                   value="{{ $settings['social_twitter'] }}">
                            <div class="form-text">URL halaman Twitter</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">LinkedIn</label>
                            <input type="url" name="settings[social_linkedin]" class="form-control" 
                                   value="{{ $settings['social_linkedin'] }}">
                            <div class="form-text">URL halaman LinkedIn</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">YouTube</label>
                            <input type="url" name="settings[social_youtube]" class="form-control" 
                                   value="{{ $settings['social_youtube'] }}">
                            <div class="form-text">URL channel YouTube</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">TikTok</label>
                            <input type="url" name="settings[social_tiktok]" class="form-control" 
                                   value="{{ $settings['social_tiktok'] }}">
                            <div class="form-text">URL halaman TikTok</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="save-section">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
                <div class="mt-3">
                    <small class="text-muted">Perubahan akan langsung terlihat di halaman kontak publik</small>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
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
@endsection