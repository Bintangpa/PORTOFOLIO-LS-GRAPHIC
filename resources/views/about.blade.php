@extends('layouts.app')

@section('title', 'Tentang Kami - LittleStar Studio')

@section('content')
<div class="container">
    <div class="content-wrapper">
        <!-- Hero Section -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    <span class="text-gradient">Tentang</span> LittleStar Studio
                </h1>
                <p class="lead text-muted mb-4">
                    Kami adalah studio kreatif yang berdedikasi untuk menciptakan karya-karya digital yang menginspirasi dan memberikan dampak positif bagi klien dan masyarakat.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-envelope me-2"></i>Hubungi Kami
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-briefcase me-2"></i>Lihat Portfolio
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image-wrapper">
                    <img src="{{ asset('images/logo-ls-biru.png') }}" alt="LittleStar Studio" class="img-fluid about-logo">
                </div>
            </div>
        </div>

        <!-- Vision & Mission -->
        <div class="row mb-5">
            <div class="col-lg-6 mb-4">
                <div class="vision-card h-100">
                    <div class="card-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="h4 fw-bold mb-3">Visi Kami</h3>
                    <p class="text-muted">
                        Menjadi studio kreatif terdepan yang menghadirkan solusi digital inovatif dan berkualitas tinggi, 
                        serta memberikan pengalaman luar biasa bagi setiap klien yang bekerja sama dengan kami.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="mission-card h-100">
                    <div class="card-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="h4 fw-bold mb-3">Misi Kami</h3>
                    <p class="text-muted">
                        Menciptakan karya-karya digital yang tidak hanya indah secara visual, tetapi juga fungsional 
                        dan memberikan nilai tambah bagi bisnis klien melalui pendekatan yang kreatif dan profesional.
                    </p>
                </div>
            </div>
        </div>

        <!-- Our Values -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">
                    <span class="text-gradient">Nilai-Nilai</span> Kami
                </h2>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Kreativitas</h4>
                    <p class="text-muted">
                        Kami selalu mencari solusi kreatif dan inovatif untuk setiap tantangan yang dihadapi.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Kualitas</h4>
                    <p class="text-muted">
                        Setiap karya yang kami hasilkan selalu mengutamakan kualitas dan detail yang sempurna.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Kolaborasi</h4>
                    <p class="text-muted">
                        Kami percaya bahwa hasil terbaik lahir dari kolaborasi yang solid dengan klien.
                    </p>
                </div>
            </div>
        </div>

        <!-- Our Services -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-5">
                    <span class="text-gradient">Layanan</span> Kami
                </h2>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Web Development</h5>
                    <p class="text-muted small">
                        Pengembangan website responsif dan modern dengan teknologi terkini.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Mobile App</h5>
                    <p class="text-muted small">
                        Aplikasi mobile yang user-friendly untuk iOS dan Android.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h5 class="fw-bold mb-2">UI/UX Design</h5>
                    <p class="text-muted small">
                        Desain antarmuka yang menarik dan pengalaman pengguna yang optimal.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Digital Marketing</h5>
                    <p class="text-muted small">
                        Strategi pemasaran digital untuk meningkatkan visibilitas online.
                    </p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="row">
            <div class="col-12">
                <div class="cta-section text-center">
                    <h3 class="fw-bold mb-3">Siap Berkolaborasi dengan Kami?</h3>
                    <p class="text-muted mb-4">
                        Mari wujudkan ide kreatif Anda bersama LittleStar Studio. 
                        Hubungi kami untuk konsultasi gratis!
                    </p>
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-paper-plane me-2"></i>Mulai Proyek Anda
                    </a>
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

.about-image-wrapper {
    text-align: center;
    padding: 2rem;
}

.about-logo {
    max-width: 300px;
    filter: drop-shadow(0 10px 30px rgba(30, 58, 138, 0.3));
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.vision-card, .mission-card {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
}

.vision-card:hover, .mission-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(30, 58, 138, 0.1);
}

.card-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.card-icon i {
    font-size: 1.5rem;
    color: white;
}

.value-card {
    padding: 2rem 1rem;
    border-radius: 15px;
    transition: all 0.3s ease;
}

.value-card:hover {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    transform: translateY(-5px);
}

.value-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.value-icon i {
    font-size: 2rem;
    color: white;
}

.service-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
    height: 100%;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(30, 58, 138, 0.1);
    border-color: #1e3a8a;
}

.service-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.service-icon i {
    font-size: 1.2rem;
    color: white;
}

.cta-section {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 20px;
    padding: 3rem 2rem;
    border: 1px solid #e2e8f0;
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

.btn-outline-primary {
    border: 2px solid #1e3a8a;
    color: #1e3a8a;
    border-radius: 25px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border-color: #1e3a8a;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(30, 58, 138, 0.3);
}
</style>
@endsection