@extends('layouts.admin')

@section('title', 'Detail Portfolio - Admin')
@section('page-title', 'Dashboard Admin')

@section('styles')
<style>
    .detail-image {
        width: 100%;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        margin-bottom: 30px;
    }
    .info-box {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
        border-left: 4px solid #1e3a8a;
    }
    .info-box h6 {
        color: #1e3a8a;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }
    .info-box p {
        margin-bottom: 0;
        color: #333;
    }
    .card-header {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
        font-weight: 600;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-eye"></i> Detail Portfolio</span>
                <div>
                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="mb-4">{{ $portfolio->title }}</h2>
                        
                        <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                             alt="{{ $portfolio->title }}" class="detail-image">
                        
                        <h5 class="mb-3">Deskripsi</h5>
                        <p style="white-space: pre-line; line-height: 1.8;">{{ $portfolio->description }}</p>
                    </div>
                    
                    <div class="col-md-4">
                        <h5 class="mb-3">Informasi Project</h5>
                        
                        @if($portfolio->category)
                            <div class="info-box">
                                <h6><i class="fas fa-tag"></i> Kategori</h6>
                                <p>{{ $portfolio->category }}</p>
                            </div>
                        @endif
                        
                        @if($portfolio->client)
                            <div class="info-box">
                                <h6><i class="fas fa-user-tie"></i> Klien</h6>
                                <p>{{ $portfolio->client }}</p>
                            </div>
                        @endif
                        
                        @if($portfolio->project_date)
                            <div class="info-box">
                                <h6><i class="fas fa-calendar"></i> Tanggal Project</h6>
                                <p>{{ $portfolio->project_date->format('d F Y') }}</p>
                            </div>
                        @endif
                        
                        <div class="info-box">
                            <h6><i class="fas fa-user"></i> Dibuat Oleh</h6>
                            <p>{{ $portfolio->user->name }}</p>
                        </div>
                        
                        <div class="info-box">
                            <h6><i class="fas fa-clock"></i> Dibuat Pada</h6>
                            <p>{{ $portfolio->created_at->format('d F Y, H:i') }}</p>
                        </div>
                        
                        @if($portfolio->updated_at != $portfolio->created_at)
                            <div class="info-box">
                                <h6><i class="fas fa-history"></i> Terakhir Diupdate</h6>
                                <p>{{ $portfolio->updated_at->format('d F Y, H:i') }}</p>
                            </div>
                        @endif
                        
                        <div class="d-grid gap-2 mt-4">
                            <a href="{{ route('portfolio.show', $portfolio) }}" class="btn btn-outline-primary" target="_blank">
                                <i class="fas fa-external-link-alt"></i> Lihat di Website
                            </a>
                        </div>
                    </div>
                </div>
                
                <hr class="my-4">
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                    </a>
                    <div>
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus portfolio <strong>"{{ $portfolio->title }}"</strong>?</p>
                <p class="text-danger"><small><i class="fas fa-exclamation-triangle"></i> Aksi ini tidak dapat dibatalkan dan akan menghapus gambar dari server!</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Ya, Hapus Portfolio
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection