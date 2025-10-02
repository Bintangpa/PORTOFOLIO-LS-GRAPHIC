@extends('layouts.app')

@section('title', 'Portfolio - LittleStar Studio')

@section('styles')
<style>
    .page-header {
        text-align: center;
        color: white;
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
    }
    
    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23ffffff" opacity="0.1"><polygon points="1000,100 1000,0 0,100"/></svg>') no-repeat bottom;
        background-size: cover;
    }
    
    .page-header-content {
        position: relative;
        z-index: 2;
    }
    
    .page-header h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        background: linear-gradient(45deg, #ffffff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: fadeInUp 1s ease-out;
    }
    
    .page-header .lead {
        font-size: 1.2rem;
        margin-bottom: 0;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        animation: fadeInUp 1s ease-out 0.2s both;
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
    
    .portfolio-image-container {
        position: relative;
        width: 100%;
        aspect-ratio: 4/3;
        overflow: hidden;
    }
    
    .portfolio-card img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
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
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.8rem;
    }
    
    .search-section {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        padding: 2rem;
        margin-bottom: 2rem;
    }
    
    .search-form {
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .search-input {
        flex: 1;
        min-width: 250px;
    }
    
    .search-input .form-control {
        border: 2px solid #e9ecef;
        border-radius: 25px;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .search-input .form-control:focus {
        border-color: #000099;
        box-shadow: 0 0 0 0.2rem rgba(0, 0, 153, 0.25);
    }
    
    .search-btn {
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        border: none;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .search-btn:hover {
        background: linear-gradient(135deg, #0000cc 0%, #0000ff 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 153, 0.3);
        color: white;
    }
    
    .portfolio-grid {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        padding: 2rem;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 40px;
    }
    
    .empty-state i {
        color: #cbd5e1;
        margin-bottom: 20px;
    }
    
    .empty-state h4 {
        color: #64748b;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .empty-state p {
        color: #94a3b8;
        margin-bottom: 0;
    }
    
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }
    
    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }
        
        .search-form {
            flex-direction: column;
        }
        
        .search-input {
            width: 100%;
            min-width: auto;
        }
        
        .search-btn {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h1><i class="fas fa-briefcase"></i> Portfolio Kami</h1>
            <p class="lead">Jelajahi koleksi lengkap karya-karya terbaik LittleStar Studio</p>
        </div>
    </div>
</div>

<div class="container mb-5">
    <!-- Search Section -->
    <div class="search-section">
        <form action="{{ route('portfolio') }}" method="GET" class="search-form">
            <div class="search-input">
                <input type="text" name="search" class="form-control" 
                       placeholder="Cari portfolio berdasarkan judul, deskripsi, kategori..." 
                       value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn search-btn">
                <i class="fas fa-search me-2"></i>Cari
            </button>
            @if(request('search'))
                <a href="{{ route('portfolio') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Reset
                </a>
            @endif
        </form>
        
        @if(request('search'))
            <div class="mt-3">
                <small class="text-muted">
                    Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
                    ({{ $portfolios->total() }} hasil ditemukan)
                </small>
            </div>
        @endif
    </div>

    <!-- Portfolio Grid -->
    <div class="portfolio-grid">
        @if($portfolios->count() > 0)
            <div class="row">
                @foreach($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('portfolio.show', $portfolio) }}" class="text-decoration-none">
                            <div class="portfolio-card">
                                @if($portfolio->category)
                                    <span class="badge-category">{{ $portfolio->category }}</span>
                                @endif
                                <div class="portfolio-image-container">
                                    <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="{{ $portfolio->title }}">
                                </div>
                                <div class="portfolio-card-body">
                                    <h5 class="text-dark">{{ $portfolio->title }}</h5>
                                    <p>{{ Str::limit($portfolio->description, 80) }}</p>
                                    @if($portfolio->client)
                                        <small class="text-muted">
                                            <i class="fas fa-user me-1"></i>{{ $portfolio->client }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($portfolios->hasPages())
                <div class="pagination-wrapper">
                    {{ $portfolios->withQueryString()->links() }}
                </div>
            @endif
        @else
            <div class="empty-state">
                @if(request('search'))
                    <i class="fas fa-search fa-5x"></i>
                    <h4>Tidak ada hasil ditemukan</h4>
                    <p>Coba gunakan kata kunci yang berbeda atau <a href="{{ route('portfolio') }}">lihat semua portfolio</a></p>
                @else
                    <i class="fas fa-folder-open fa-5x"></i>
                    <h4>Belum ada portfolio</h4>
                    <p>Portfolio akan segera ditampilkan di sini</p>
                @endif
            </div>
        @endif
    </div>
</div>
@endsection