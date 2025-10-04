@extends('layouts.app')

@section('title', 'Pencarian Portofolio - ' . \App\Models\WebsiteSetting::getValue('site_name', 'LittleStar Studio'))

@section('content')
<div class="container">
    <div class="search-header">
        <div class="row align-items-center mb-4">
            <div class="col-lg-6">
                <h1 class="search-title">
                    <i class="fas fa-search me-2"></i>
                    <span class="text-gradient">Pencarian</span> Portofolio
                </h1>
                <p class="text-muted mb-0">
                    Temukan desain yang sesuai dengan kebutuhan Anda
                </p>
            </div>
            <div class="col-lg-6">
                <div class="search-stats">
                    @if(request()->hasAny(['search', 'category', 'sort']))
                        <span class="badge bg-primary fs-6">
                            {{ $portfolios->total() }} hasil ditemukan
                        </span>
                    @else
                        <span class="badge bg-secondary fs-6">
                            {{ $portfolios->total() }} total portofolio
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-lg-3 mb-4">
            <div class="filter-sidebar">
                <div class="filter-header">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-filter me-2"></i>Filter Pencarian
                    </h5>
                </div>

                <form method="GET" action="{{ route('search') }}" id="filterForm">
                    <!-- Search Input -->
                    <div class="filter-section">
                        <label class="filter-label">Kata Kunci</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" 
                                   placeholder="Masukkan kata kunci..." 
                                   value="{{ request('search') }}">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="filter-section">
                        <label class="filter-label">Kategori</label>
                        <select class="form-select mb-3" name="category" onchange="this.form.submit()">
                            <option value="all" {{ request('category') == 'all' || !request('category') ? 'selected' : '' }}>
                                Semua Kategori
                            </option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sort Filter -->
                    <div class="filter-section">
                        <label class="filter-label">Urutkan</label>
                        <select class="form-select mb-3" name="sort" onchange="this.form.submit()">
                            <option value="newest" {{ request('sort') == 'newest' || !request('sort') ? 'selected' : '' }}>
                                Terbaru
                            </option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                                Terlama
                            </option>
                            <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>
                                Judul A-Z
                            </option>
                            <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>
                                Judul Z-A
                            </option>
                        </select>
                    </div>

                    <!-- Clear Filters -->
                    @if(request()->hasAny(['search', 'category', 'sort']))
                        <div class="filter-section">
                            <a href="{{ route('search') }}" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-times me-2"></i>Hapus Filter
                            </a>
                        </div>
                    @endif
                </form>

                <!-- Quick Filters -->
                <div class="quick-filters mt-4">
                    <h6 class="fw-semibold mb-3">Filter Cepat</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($categories->take(5) as $category)
                            <a href="{{ route('search') }}?category={{ $category }}" 
                               class="badge bg-light text-dark text-decoration-none quick-filter-badge">
                                {{ ucfirst($category) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Area -->
        <div class="col-lg-9">
            <!-- Active Filters -->
            @if(request()->hasAny(['search', 'category', 'sort']))
                <div class="active-filters mb-4">
                    <h6 class="fw-semibold mb-2">Filter Aktif:</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @if(request('search'))
                            <span class="badge bg-primary">
                                Pencarian: "{{ request('search') }}"
                                <a href="{{ route('search') }}?{{ http_build_query(request()->except('search')) }}" 
                                   class="text-white ms-1">×</a>
                            </span>
                        @endif
                        @if(request('category') && request('category') !== 'all')
                            <span class="badge bg-success">
                                Kategori: {{ ucfirst(request('category')) }}
                                <a href="{{ route('search') }}?{{ http_build_query(request()->except('category')) }}" 
                                   class="text-white ms-1">×</a>
                            </span>
                        @endif
                        @if(request('sort') && request('sort') !== 'newest')
                            <span class="badge bg-info">
                                Urutan: 
                                @switch(request('sort'))
                                    @case('oldest') Terlama @break
                                    @case('title_asc') A-Z @break
                                    @case('title_desc') Z-A @break
                                @endswitch
                                <a href="{{ route('search') }}?{{ http_build_query(request()->except('sort')) }}" 
                                   class="text-white ms-1">×</a>
                            </span>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Results Grid -->
            <div class="results-container">
                @if($portfolios->count() > 0)
                    <div class="row">
                        @foreach($portfolios as $portfolio)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <a href="{{ route('portfolio.show', $portfolio) }}" class="text-decoration-none">
                                    <div class="portfolio-card">
                                        @if($portfolio->category)
                                            <span class="badge-category">{{ $portfolio->category }}</span>
                                        @endif
                                        <div class="portfolio-image">
                                            <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                                                 alt="{{ $portfolio->title }}" class="img-fluid">
                                        </div>
                                        <div class="portfolio-card-body">
                                            <h5 class="portfolio-title">{{ $portfolio->title }}</h5>
                                            <p class="portfolio-description">
                                                {{ Str::limit($portfolio->description, 80) }}
                                            </p>
                                            @if($portfolio->technologies)
                                                <div class="portfolio-tech">
                                                    <small class="text-muted">
                                                        <i class="fas fa-code me-1"></i>
                                                        {{ Str::limit($portfolio->technologies, 50) }}
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $portfolios->links() }}
                    </div>
                @else
                    <div class="no-results">
                        <div class="text-center py-5">
                            <i class="fas fa-search fa-5x text-muted mb-3"></i>
                            <h4 class="text-muted">Tidak ada hasil ditemukan</h4>
                            <p class="text-muted mb-4">
                                Coba ubah kata kunci atau filter pencarian Anda
                            </p>
                            <a href="{{ route('search') }}" class="btn btn-primary">
                                <i class="fas fa-refresh me-2"></i>Reset Pencarian
                            </a>
                        </div>
                    </div>
                @endif
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

.search-header {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    border: 1px solid #e2e8f0;
}

.search-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.search-stats {
    text-align: right;
}

.filter-sidebar {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    border: 1px solid #e2e8f0;
    position: sticky;
    top: 100px;
}

.filter-header {
    border-bottom: 1px solid #e2e8f0;
    padding-bottom: 1rem;
    margin-bottom: 1.5rem;
}

.filter-section {
    margin-bottom: 1.5rem;
}

.filter-label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
    display: block;
}

.form-control, .form-select {
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    padding: 0.75rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #1e3a8a;
    box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25);
}

.quick-filter-badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
}

.quick-filter-badge:hover {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%) !important;
    color: white !important;
    transform: translateY(-2px);
}

.active-filters {
    background: #f8fafc;
    border-radius: 10px;
    padding: 1rem;
    border: 1px solid #e2e8f0;
}

.portfolio-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    position: relative;
}

.portfolio-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.portfolio-image {
    position: relative;
    width: 100%;
    aspect-ratio: 4/3;
    overflow: hidden;
}

.portfolio-image img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.portfolio-card:hover .portfolio-image img {
    transform: scale(1.1);
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
    z-index: 2;
}

.portfolio-card-body {
    padding: 1.5rem;
}

.portfolio-title {
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.portfolio-description {
    color: #6b7280;
    font-size: 0.9rem;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.portfolio-tech {
    border-top: 1px solid #e2e8f0;
    padding-top: 0.75rem;
}

.no-results {
    background: white;
    border-radius: 15px;
    padding: 3rem;
    text-align: center;
    border: 1px solid #e2e8f0;
}

.btn-primary {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border: none;
    border-radius: 25px;
    padding: 0.75rem 1.5rem;
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
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border-color: #1e3a8a;
    color: white;
}

.btn-outline-secondary {
    border: 2px solid #6b7280;
    color: #6b7280;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-secondary:hover {
    background: #6b7280;
    border-color: #6b7280;
    color: white;
}

@media (max-width: 991.98px) {
    .filter-sidebar {
        position: static;
        margin-bottom: 2rem;
    }
    
    .search-stats {
        text-align: left;
        margin-top: 1rem;
    }
    
    .search-title {
        font-size: 2rem;
    }
}
</style>
@endsection