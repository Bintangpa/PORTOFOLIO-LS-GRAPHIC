@extends('layouts.app')

@section('title', 'Kontak Kami - LittleStar Studio')

@section('content')
<div class="container">
    <div class="content-wrapper">
        <!-- Header Section -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-4">
                    <span class="text-gradient">Hubungi</span> Kami
                </h1>
                <p class="lead text-muted mb-0">
                    Siap membantu mewujudkan ide kreatif Anda. Mari berkolaborasi!
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
            <!-- Contact Form -->
            <div class="col-lg-8 mb-5">
                <div class="contact-form-wrapper">
                    <h3 class="fw-bold mb-4">
                        <i class="fas fa-paper-plane me-2 text-primary"></i>
                        Kirim Pesan
                    </h3>
                    
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label fw-semibold">Subjek</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                   id="subject" name="subject" value="{{ old('subject') }}" required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold">Pesan</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      id="message" name="message" rows="6" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-send me-2"></i>Kirim Pesan
                        </button>
                    </form>
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
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h5 class="fw-semibold mb-1">Alamat</h5>
                            <p class="text-muted mb-0">
                                Jl. Kreatif No. 123<br>
                                Jakarta Selatan, 12345<br>
                                Indonesia
                            </p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h5 class="fw-semibold mb-1">Telepon</h5>
                            <p class="text-muted mb-0">
                                <a href="tel:+6281234567890" class="text-decoration-none">
                                    +62 812-3456-7890
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
                                <a href="mailto:hello@littlestarstudio.com" class="text-decoration-none">
                                    hello@littlestarstudio.com
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
                                Senin - Jumat: 09:00 - 18:00<br>
                                Sabtu: 09:00 - 15:00<br>
                                Minggu: Tutup
                            </p>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="social-media mt-4">
                        <h5 class="fw-semibold mb-3">Ikuti Kami</h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="social-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="map-wrapper">
                    <h3 class="fw-bold mb-4 text-center">
                        <i class="fas fa-map me-2 text-primary"></i>
                        Lokasi Kami
                    </h3>
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.2087634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1635123456789!5m2!1sen!2sid" 
                            width="100%" 
                            height="400" 
                            style="border:0; border-radius: 15px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="fw-bold mb-4 text-center">
                    <i class="fas fa-question-circle me-2 text-primary"></i>
                    Pertanyaan yang Sering Diajukan
                </h3>
                
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Berapa lama waktu pengerjaan proyek?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Waktu pengerjaan bervariasi tergantung kompleksitas proyek. Untuk website sederhana biasanya 2-4 minggu, 
                                sedangkan untuk aplikasi kompleks bisa memakan waktu 2-6 bulan. Kami akan memberikan timeline yang jelas 
                                setelah konsultasi awal.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Apakah ada garansi untuk proyek yang dikerjakan?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, kami memberikan garansi 3 bulan untuk bug fixing dan maintenance ringan setelah proyek selesai. 
                                Untuk maintenance jangka panjang, kami juga menyediakan paket maintenance bulanan.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Bagaimana sistem pembayaran yang diterapkan?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Kami menerapkan sistem pembayaran bertahap: 30% di awal sebagai down payment, 40% saat progress 50%, 
                                dan 30% sisanya saat proyek selesai. Pembayaran dapat dilakukan melalui transfer bank atau e-wallet.
                            </div>
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

.contact-form-wrapper {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid #e2e8f0;
}

.contact-info-wrapper {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid #e2e8f0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.form-control {
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #1e3a8a;
    box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25);
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

.map-wrapper {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid #e2e8f0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.map-container {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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

.accordion-item {
    border: 1px solid #e2e8f0;
    border-radius: 15px !important;
    margin-bottom: 1rem;
    overflow: hidden;
}

.accordion-button {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border: none;
    font-weight: 600;
    color: #1e3a8a;
}

.accordion-button:not(.collapsed) {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: transparent;
}

.accordion-body {
    background: white;
    color: #6b7280;
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