@extends('layouts.app')

@section('title', $portfolio->title . ' - ' . \App\Models\WebsiteSetting::getValue('site_name', 'LittleStar Studio'))

@section('styles')
<style>
    .detail-image {
        width: 100%;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        margin-bottom: 30px;
    }
    .detail-info {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 20px;
    }
    .detail-info h6 {
        color: #1e3a8a;
        font-weight: 600;
        margin-bottom: 5px;
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="content-wrapper">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary mb-4">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        
        <h1 class="mb-4">{{ $portfolio->title }}</h1>
        
        <div class="row">
            <div class="col-md-8">
                <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="{{ $portfolio->title }}" class="detail-image">
            </div>
            
            <div class="col-md-4">
                @if($portfolio->category)
                    <div class="detail-info">
                        <h6>Kategori</h6>
                        <p class="mb-0">{{ $portfolio->category }}</p>
                    </div>
                @endif
                
                @if($portfolio->client)
                    <div class="detail-info">
                        <h6>Klien</h6>
                        <p class="mb-0">{{ $portfolio->client }}</p>
                    </div>
                @endif
                
                @if($portfolio->project_date)
                    <div class="detail-info">
                        <h6>Tanggal Project</h6>
                        <p class="mb-0">{{ $portfolio->project_date->format('d M Y') }}</p>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="mt-4">
            <h4>Deskripsi</h4>
            <p style="white-space: pre-line;">{{ $portfolio->description }}</p>
        </div>
    </div>
</div>
@endsection