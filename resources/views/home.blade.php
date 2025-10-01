@extends('layouts.app')

@section('title', 'Beranda - LittleStar Studio')

@section('styles')
<style>
    .hero-section {
        text-align: center;
        color: white;
        padding: 80px 0 60px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23ffffff" opacity="0.1"><polygon points="1000,100 1000,0 0,100"/></svg>') no-repeat bottom;
        background-size: cover;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .hero-section h1 {
        font-size: 4rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        background: linear-gradient(45deg, #ffffff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: fadeInUp 1s ease-out;
    }
    
    .hero-section .lead {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        animation: fadeInUp 1s ease-out 0.2s both;
    }
    
    .hero-buttons {
        animation: fadeInUp 1s ease-out 0.4s both;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .portfolio-card {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        background: white;
        margin-bottom: 30px;
    }
    .portfolio-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    .portfolio-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: transform 0.3s;
    }
    .portfolio-card:hover img {
        transform: scale(1.1);
    }
    .portfolio-card-body {
        padding: 20px;
    }
    .portfolio-card-body h5 {
        font-weight: 600;
        margin-bottom: 10px;
    }
    .portfolio-card-body p {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 0;
    }
    .badge-category {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.8rem;
    }
    
    .text-gradient {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .btn-hero {
        padding: 1rem 2rem;
        font-weight: 600;
        border-radius: 25px;
        transition: all 0.3s ease;
        margin: 0 0.5rem;
    }
    
    .btn-hero-primary {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        backdrop-filter: blur(10px);
    }
    
    .btn-hero-primary:hover {
        background: white;
        color: #1e3a8a;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(255, 255, 255, 0.3);
    }
    
    .btn-hero-outline {
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.5);
        color: white;
    }
    
    .btn-hero-outline:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: white;
        color: white;
        transform: translateY(-2px);
    }
    
    
    .section-title {
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .section-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .section-title p {
        font-size: 1.1rem;
        color: #6b7280;
        max-width: 600px;
        margin: 0 auto;
    }
    
    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2.5rem;
        }
        
        .hero-section .lead {
            font-size: 1.2rem;
        }
        
        .btn-hero {
            display: block;
            margin: 0.5rem 0;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1><i class="fas fa-star"></i> LittleStar Studio</h1>
            <p class="lead">Menciptakan Karya Digital yang Menginspirasi</p>
            <div class="hero-buttons">
                <a href="#portfolio-preview" class="btn btn-hero btn-hero-primary">
                    <i class="fas fa-briefcase me-2"></i>Lihat Portfolio
                </a>
                <a href="{{ route('contact') }}" class="btn btn-hero btn-hero-outline">
                    <i class="fas fa-envelope me-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">

    <!-- Portfolio Preview Section -->
    <div class="content-wrapper" id="portfolio-preview">
        <div class="section-title">
            <h2><span class="text-gradient">Portfolio</span> Terbaru</h2>
            <p>Lihat beberapa karya terbaru kami yang telah berhasil membantu klien mencapai tujuan mereka</p>
        </div>
        
        @if($portfolios->count() > 0)
            <div class="row">
                @foreach($portfolios->take(6) as $portfolio)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('portfolio.show', $portfolio) }}" class="text-decoration-none">
                            <div class="portfolio-card">
                                @if($portfolio->category)
                                    <span class="badge-category">{{ $portfolio->category }}</span>
                                @endif
                                <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="{{ $portfolio->title }}">
                                <div class="portfolio-card-body">
                                    <h5 class="text-dark">{{ $portfolio->title }}</h5>
                                    <p>{{ Str::limit($portfolio->description, 80) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
            @if($portfolios->count() > 6)
                <div class="text-center mt-4">
                    <a href="{{ route('home') }}?show=all" class="btn btn-primary btn-lg">
                        <i class="fas fa-th me-2"></i>Lihat Semua Portfolio
                    </a>
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <i class="fas fa-folder-open fa-5x text-muted mb-3"></i>
                <h4 class="text-muted">Belum ada portfolio</h4>
                <p class="text-muted">Portfolio akan segera ditampilkan di sini</p>
            </div>
        @endif
    </div>
    
    <!-- Call to Action Section -->
    <div class="content-wrapper mt-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">
                    <span class="text-gradient">Siap Memulai</span> Proyek Anda?
                </h3>
                <p class="text-muted mb-0">
                    Mari berkolaborasi untuk mewujudkan ide kreatif Anda menjadi kenyataan. 
                    Hubungi kami untuk konsultasi gratis!
                </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-rocket me-2"></i>Mulai Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
@endsection