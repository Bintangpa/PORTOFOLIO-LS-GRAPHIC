@extends('layouts.app')

@section('title', \App\Models\WebsiteSetting::getValue('contact_title', 'Kontak Kami') . ' - ' . \App\Models\WebsiteSetting::getValue('site_name', 'LittleStar Studio'))

@section('content')
<div class="container">
    <div class="content-wrapper">
        <!-- Header Section -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-4">
                    <span class="text-gradient">{{ \App\Models\WebsiteSetting::getValue('contact_header', 'Hubungi Kami') }}</span>
                </h1>
                <p class="lead text-muted mb-0">
                    {{ \App\Models\WebsiteSetting::getValue('contact_subtitle', 'Siap membantu mewujudkan ide kreatif Anda. Mari berkolaborasi!') }}
                </p>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <!-- Social Media Contact -->
            <div class="col-lg-8 mb-5">
                <div class="social-contact-wrapper">
                    <h3 class="fw-bold mb-4">
                        <i class="fas fa-comments me-2 text-primary"></i>
                        Hubungi Kami
                    </h3>
                    <p class="text-muted mb-4">
                        Pilih platform yang paling nyaman untuk Anda berkomunikasi dengan kami:
                    </p>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <a href="https://wa.me/{{ str_replace(['+', '-', ' '], '', \App\Models\ContactSetting::getValue('contact_whatsapp', '6281234567890')) }}?text=Halo%20{{ \App\Models\ContactSetting::getValue('company_name', 'LittleStar Studio') }},%20saya%20tertarik%20dengan%20layanan%20Anda" 
                               target="_blank" class="social-contact-card whatsapp-card">
                                <div class="social-contact-icon">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <div class="social-contact-content">
                                    <h5 class="fw-bold mb-2">WhatsApp</h5>
                                    <p class="mb-2">Chat langsung dengan tim kami</p>
                                    <small class="text-muted">Respon cepat • Online 24/7</small>
                                </div>
                                <div class="social-contact-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <a href="{{ \App\Models\ContactSetting::getValue('social_instagram', 'https://instagram.com/littlestarstudio') }}" 
                               target="_blank" class="social-contact-card instagram-card">
                                <div class="social-contact-icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <div class="social-contact-content">
                                    <h5 class="fw-bold mb-2">Instagram</h5>
                                    <p class="mb-2">Lihat portfolio & kirim DM</p>
                                    <small class="text-muted">Portfolio terbaru • Behind the scenes</small>
                                </div>
                                <div class="social-contact-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="contact-note">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Tips:</strong> Untuk respon yang lebih cepat, gunakan WhatsApp. 
                            Untuk melihat portfolio terbaru dan inspirasi, kunjungi Instagram kami.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4">
                <div class="contact-info-wrapper">
                    <h3 class="fw-bold mb-4">
                        <i class="fas fa-info-circle me-2 text-primary"></i>
                        Informasi Kontak
                    </h3>
                    


                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h5 class="fw-semibold mb-1">Telepon</h5>
                            <p class="text-muted mb-0">
                                <a href="tel:{{ \App\Models\ContactSetting::getValue('contact_phone', '+6281234567890') }}" class="text-decoration-none">
                                    {{ \App\Models\ContactSetting::getValue('contact_phone', '+62 812-3456-7890') }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h5 class="fw-semibold mb-1">Email</h5>
                            <p class="text-muted mb-0">
                                <a href="mailto:{{ \App\Models\ContactSetting::getValue('contact_email', 'hello@littlestarstudio.com') }}" class="text-decoration-none">
                                    {{ \App\Models\ContactSetting::getValue('contact_email', 'hello@littlestarstudio.com') }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h5 class="fw-semibold mb-1">Jam Operasional</h5>
                            <p class="text-muted mb-0">
                                {!! nl2br(e(\App\Models\ContactSetting::getValue('operating_hours', 'Senin - Jumat: 09:00 - 18:00\nSabtu: 09:00 - 15:00\nMinggu: Tutup'))) !!}
                            </p>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="social-media mt-4">
                        <h5 class="fw-semibold mb-3">Ikuti Kami</h5>
                        <div class="d-flex gap-3">
                            @if(\App\Models\ContactSetting::getValue('social_instagram'))
                            <a href="{{ \App\Models\ContactSetting::getValue('social_instagram') }}" target="_blank" class="social-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                            @endif
                            @if(\App\Models\ContactSetting::getValue('social_facebook'))
                            <a href="{{ \App\Models\ContactSetting::getValue('social_facebook') }}" target="_blank" class="social-link">
                                <i class="fab fa-facebook"></i>
                            </a>
                            @endif
                            @if(\App\Models\ContactSetting::getValue('social_twitter'))
                            <a href="{{ \App\Models\ContactSetting::getValue('social_twitter') }}" target="_blank" class="social-link">
                                <i class="fab fa-twitter"></i>
                            </a>
                            @endif
                            @if(\App\Models\ContactSetting::getValue('social_linkedin'))
                            <a href="{{ \App\Models\ContactSetting::getValue('social_linkedin') }}" target="_blank" class="social-link">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            @endif
                            @if(\App\Models\ContactSetting::getValue('social_youtube'))
                            <a href="{{ \App\Models\ContactSetting::getValue('social_youtube') }}" target="_blank" class="social-link">
                                <i class="fab fa-youtube"></i>
                            </a>
                            @endif
                            @if(\App\Models\ContactSetting::getValue('social_tiktok'))
                            <a href="{{ \App\Models\ContactSetting::getValue('social_tiktok') }}" target="_blank" class="social-link">
                                <i class="fab fa-tiktok"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>

<style>
.text-gradient {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.social-contact-wrapper {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid #e2e8f0;
}

.social-contact-card {
    display: flex;
    align-items: center;
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    text-decoration: none;
    color: inherit;
    border: 2px solid #e2e8f0;
    transition: all 0.3s ease;
    height: 100%;
}

.social-contact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    text-decoration: none;
    color: inherit;
}

.whatsapp-card:hover {
    border-color: #25d366;
    box-shadow: 0 15px 40px rgba(37, 211, 102, 0.3);
}

.instagram-card:hover {
    border-color: #e4405f;
    box-shadow: 0 15px 40px rgba(228, 64, 95, 0.3);
}

.social-contact-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    flex-shrink: 0;
}

.whatsapp-card .social-contact-icon {
    background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
}

.instagram-card .social-contact-icon {
    background: linear-gradient(135deg, #e4405f 0%, #833ab4 50%, #fccc63 100%);
}

.social-contact-icon i {
    font-size: 1.8rem;
    color: white;
}

.social-contact-content {
    flex: 1;
}

.social-contact-content h5 {
    margin-bottom: 0.5rem;
    color: #1f2937;
}

.social-contact-content p {
    margin-bottom: 0.25rem;
    color: #6b7280;
}

.social-contact-arrow {
    margin-left: 1rem;
    opacity: 0.5;
    transition: all 0.3s ease;
}

.social-contact-card:hover .social-contact-arrow {
    opacity: 1;
    transform: translateX(5px);
}

.contact-note {
    margin-top: 2rem;
}

.contact-note .alert {
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    border: 2px solid #3b82f6;
    color: #1e40af;
    border-radius: 15px;
}

.contact-info-wrapper {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid #e2e8f0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}



.contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    flex-shrink: 0;
}

.contact-icon i {
    font-size: 1.2rem;
    color: white;
}

.contact-details a {
    color: #1e3a8a;
    transition: color 0.3s ease;
}

.contact-details a:hover {
    color: #1e40af;
}

.social-link {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(30, 58, 138, 0.3);
    color: white;
}



.btn-primary {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border: none;
    border-radius: 25px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(30, 58, 138, 0.3);
}



.alert-success {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: none;
    border-radius: 15px;
    color: white;
}

.alert-success .btn-close {
    filter: brightness(0) invert(1);
}
</style>
@endsection