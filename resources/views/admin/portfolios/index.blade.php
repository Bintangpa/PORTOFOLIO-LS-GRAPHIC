@extends('layouts.admin')

@section('title', 'Kelola Portfolio - Admin')
@section('page-title', 'Dashboard Admin')

@section('styles')
<style>
    .portfolio-table img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }
    
    .portfolio-table img:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
    }
    
    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }
    
    .action-buttons .btn {
        padding: 8px 12px;
        font-size: 0.85rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        border: none;
        font-weight: 600;
    }
    
    .action-buttons .btn:hover {
        transform: translateY(-2px);
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stats-card {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
        border-radius: 20px;
        padding: 30px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(30, 58, 138, 0.3);
    }
    
    .stats-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }
    
    .stats-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(30, 58, 138, 0.4);
    }
    
    .stats-card h3 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    .stats-card p {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 600;
        position: relative;
        z-index: 2;
        opacity: 0.95;
        letter-spacing: 1px;
    }
    
    .stats-icon {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 4rem;
        opacity: 0.2;
        z-index: 1;
    }
    
    .page-header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 25px 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .page-header h2 {
        margin: 0;
        font-weight: 700;
        font-size: 2rem;
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .portfolio-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid #f0f0f0;
    }
    
    .portfolio-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }
    
    .portfolio-title {
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 5px;
        font-size: 1.1rem;
    }
    
    .portfolio-description {
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 0;
    }
    
    .category-badge {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        border: none;
    }
    
    .date-badge {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        color: #374151;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 500;
        border: 1px solid #e2e8f0;
    }
    
    .empty-state {
        background: white;
        border-radius: 20px;
        padding: 60px 40px;
        text-align: center;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border: 2px dashed #e2e8f0;
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
        margin-bottom: 25px;
    }
    
    .modal-content {
        border-radius: 20px;
        border: none;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }
    
    .modal-header {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
        border-radius: 20px 20px 0 0;
        border: none;
        padding: 20px 25px;
    }
    
    .modal-title {
        font-weight: 700;
        font-size: 1.2rem;
    }
    
    .modal-body {
        padding: 25px;
    }
    
    .modal-footer {
        border: none;
        padding: 20px 25px;
        background: #f8fafc;
        border-radius: 0 0 20px 20px;
    }
    
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')

<!-- Statistics -->
<div class="stats-grid">
    <div class="stats-card">
        <div class="stats-icon">
            <i class="fas fa-images"></i>
        </div>
        <h3>{{ $portfolios->total() }}</h3>
        <p>Total Portfolio</p>
    </div>
    
    <div class="stats-card">
        <div class="stats-icon">
            <i class="fas fa-eye"></i>
        </div>
        <h3>{{ number_format($portfolios->total() * 150) }}</h3>
        <p>Total Views</p>
    </div>
    
    <div class="stats-card">
        <div class="stats-icon">
            <i class="fas fa-calendar"></i>
        </div>
        <h3>{{ $portfolios->where('created_at', '>=', now()->startOfMonth())->count() }}</h3>
        <p>Bulan Ini</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($portfolios->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover portfolio-table">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Klien</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($portfolios as $portfolio)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="{{ $portfolio->title }}">
                                </td>
                                <td>
                                    <div class="portfolio-title">{{ $portfolio->title }}</div>
                                    <div class="portfolio-description">{{ Str::limit($portfolio->description, 50) }}</div>
                                </td>
                                <td>
                                    @if($portfolio->category)
                                        <span class="badge category-badge">{{ $portfolio->category }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-semibold text-dark">{{ $portfolio->client ?? '-' }}</span>
                                </td>
                                <td>
                                    @if($portfolio->project_date)
                                        <span class="badge date-badge">{{ $portfolio->project_date->format('d/m/Y') }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="action-buttons">
                                    <a href="{{ route('admin.portfolios.show', $portfolio) }}" class="btn btn-sm btn-info" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $portfolio->id }}" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $portfolio->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus portfolio <strong>"{{ $portfolio->title }}"</strong>?</p>
                                                    <p class="text-danger"><small><i class="fas fa-exclamation-triangle"></i> Aksi ini tidak dapat dibatalkan!</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                {{ $portfolios->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-folder-open fa-5x"></i>
                <h4>Belum ada portfolio</h4>
                <p>Mulai showcase karya terbaik Anda dengan menambahkan portfolio pertama</p>
                <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Portfolio Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection