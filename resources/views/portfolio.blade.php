@extends('layouts.app')

@section('title', \App\Models\WebsiteSetting::getValue('portfolio_title', 'Portfolio') . ' - ' . \App\Models\WebsiteSetting::getValue('site_name', 'LittleStar Studio'))

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
        margin-bottom: 15px;
    }
    
    .portfolio-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
    }
    
    .category-tag, .client-tag {
        display: inline-flex;
        align-items: center;
        padding: 4px 10px;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 500;
        text-decoration: none;
    }
    
    .category-tag {
        background: linear-gradient(135deg, #e0f2fe 0%, #b3e5fc 100%);
        color: #0277bd;
        border: 1px solid #81d4fa;
    }
    
    .client-tag {
        background: linear-gradient(135deg, #f3e5f5 0%, #e1bee7 100%);
        color: #7b1fa2;
        border: 1px solid #ce93d8;
    }
    
    .badge-category {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 25px;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(0, 0, 153, 0.3);
        z-index: 3;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
    }
    
    .portfolio-card:hover .badge-category {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 0, 153, 0.4);
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
    
    .category-filter-btn {
        display: inline-block;
        padding: 6px 16px;
        background: #f8f9fa;
        color: #6c757d;
        text-decoration: none;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }
    
    .category-filter-btn:hover {
        background: #e9ecef;
        color: #495057;
        text-decoration: none;
        transform: translateY(-1px);
    }
    
    .category-filter-btn.active {
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        color: white;
        border-color: #000099;
        box-shadow: 0 4px 15px rgba(0, 0, 153, 0.3);
    }
    
    .category-filter-btn.active:hover {
        background: linear-gradient(135deg, #0000cc 0%, #000099 100%);
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
        
        .category-filter-btn {
            font-size: 0.8rem;
            padding: 5px 12px;
        }
        
        .portfolio-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 6px;
        }
        
        .badge-category {
            top: 10px;
            right: 10px;
            padding: 6px 12px;
            font-size: 0.7rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h1><i class="fas fa-briefcase"></i> {{ \App\Models\WebsiteSetting::getValue('portfolio_header', 'Portfolio Kami') }}</h1>
            <p class="lead">{{ \App\Models\WebsiteSetting::getValue('portfolio_subtitle', 'Jelajahi koleksi lengkap karya-karya terbaik LittleStar Studio') }}</p>
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
            @if(request('search') || request('category'))
                <a href="{{ route('portfolio') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Reset
                </a>
            @endif
        </form>
        
        @if(request('search') || request('category'))
            <div class="mt-3">
                <small class="text-muted">
                    @if(request('search') && request('category'))
                        Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong> 
                        dalam kategori <strong>"{{ request('category') }}"</strong>
                    @elseif(request('search'))
                        Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
                    @elseif(request('category'))
                        Menampilkan portfolio kategori: <strong>"{{ request('category') }}"</strong>
                    @endif
                    ({{ $portfolios->total() }} hasil ditemukan)
                </small>
            </div>
        @endif
        
        <!-- Category Filter -->
        @php
            $categories = \App\Models\Portfolio::whereNotNull('category')
                                                ->where('category', '!=', '')
                                                ->distinct()
                                                ->pluck('category')
                                                ->sort();
        @endphp
        
        @if($categories->count() > 0)
            <div class="mt-3">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <small class="text-muted me-2">Filter kategori:</small>
                    <a href="{{ route('portfolio') }}" class="category-filter-btn {{ !request('category') ? 'active' : '' }}">
                        Semua
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('portfolio') }}?category={{ urlencode($category) }}{{ request('search') ? '&search=' . urlencode(request('search')) : '' }}" 
                           class="category-filter-btn {{ request('category') == $category ? 'active' : '' }}">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
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
                                    <div class="portfolio-meta">
                                        @if($portfolio->category)
                                            <span class="category-tag">
                                                <i class="fas fa-tag me-1"></i>{{ $portfolio->category }}
                                            </span>
                                        @endif
                                        @if($portfolio->client)
                                            <span class="client-tag">
                                                <i class="fas fa-user me-1"></i>{{ $portfolio->client }}
                                            </span>
                                        @endif
                                    </div>
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