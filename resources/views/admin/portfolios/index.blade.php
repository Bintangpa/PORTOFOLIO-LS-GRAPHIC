@extends('layouts.admin')

@section('title', 'Kelola Portfolio - Admin')
@section('page-title', 'Dashboard Admin')

@section('styles')
<style>
    .table-container {
        overflow: visible;
        width: 100%;
    }
    
    .portfolio-table {
        font-size: 0.9rem;
        width: 100%;
        table-layout: fixed;
    }
    
    .portfolio-table td {
        padding: 12px 8px;
        vertical-align: middle;
        word-wrap: break-word;
        overflow: hidden;
        height: 80px;
    }
    
    .portfolio-table tr {
        height: 80px;
    }
    
    .portfolio-table th {
        padding: 12px 8px;
        font-size: 0.85rem;
        font-weight: 600;
        border-bottom: 2px solid #e2e8f0;
    }
    
    .portfolio-table img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
        align-items: center;
        height: auto;
        padding: 0;
    }
    
    .action-buttons .btn {
        padding: 6px 10px;
        font-size: 0.8rem;
        border-radius: 6px;
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
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        color: white;
        border-radius: 20px;
        padding: 30px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(0, 0, 153, 0.3);
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
        box-shadow: 0 20px 40px rgba(0, 0, 153, 0.4);
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
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
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
        font-weight: 600;
        color: #000099;
        margin-bottom: 3px;
        font-size: 0.95rem;
        line-height: 1.3;
    }
    
    .portfolio-description {
        color: #6b7280;
        font-size: 0.8rem;
        margin-bottom: 0;
        line-height: 1.4;
    }
    
    .category-badge {
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
        color: white;
        padding: 3px 10px;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 600;
        border: none;
    }
    
    .date-badge {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        color: #374151;
        padding: 3px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
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
        background: linear-gradient(135deg, #000099 0%, #0000cc 100%);
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
    
    /* Custom Delete Modal Styles */
    .delete-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(5px);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s ease;
    }
    
    .delete-modal-container {
        max-width: 500px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
    }
    
    .delete-modal-content {
        background: white;
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        animation: slideIn 0.3s ease;
        position: relative;
    }
    
    .delete-modal-header {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        padding: 30px;
        text-align: center;
        position: relative;
    }
    
    .delete-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2.5rem;
        animation: pulse 2s infinite;
    }
    
    .delete-modal-header h3 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    .delete-modal-body {
        padding: 40px 30px;
        text-align: center;
    }
    
    .delete-message {
        font-size: 1.1rem;
        color: #374151;
        margin-bottom: 20px;
        font-weight: 500;
    }
    
    .portfolio-info {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        border: 2px solid #f59e0b;
        border-radius: 15px;
        padding: 20px;
        margin: 20px 0;
        font-size: 1.1rem;
        color: #92400e;
    }
    
    .warning-text {
        color: #dc2626;
        font-weight: 600;
        margin: 20px 0 0;
        font-size: 0.95rem;
    }
    
    .warning-text i {
        margin-right: 8px;
        animation: blink 1.5s infinite;
    }
    
    .delete-modal-footer {
        background: #f8fafc;
        padding: 25px 30px;
        display: flex;
        justify-content: center;
        gap: 15px;
    }
    
    .btn-cancel, .btn-delete {
        padding: 12px 30px;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .btn-cancel {
        background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
        color: white;
    }
    
    .btn-cancel:hover {
        background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(75, 85, 99, 0.3);
    }
    
    .btn-delete {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
    }
    
    .btn-delete:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 38, 38, 0.4);
    }
    
    .btn-delete:active, .btn-cancel:active {
        transform: translateY(0);
    }
    
    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes slideIn {
        from { 
            opacity: 0;
            transform: translateY(-50px) scale(0.9);
        }
        to { 
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .delete-modal-container {
            width: 95%;
        }
        
        .delete-modal-header {
            padding: 25px 20px;
        }
        
        .delete-modal-body {
            padding: 30px 20px;
        }
        
        .delete-modal-footer {
            padding: 20px;
            flex-direction: column;
        }
        
        .btn-cancel, .btn-delete {
            width: 100%;
            min-width: auto;
        }
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
        
        .portfolio-table {
            font-size: 0.8rem;
        }
        
        .portfolio-table td {
            padding: 8px 4px;
            height: 65px;
        }
        
        .portfolio-table tr {
            height: 65px;
        }
        
        .portfolio-table th {
            padding: 8px 4px;
            font-size: 0.8rem;
        }
        
        .portfolio-table th:nth-child(1) { width: 60px !important; }
        .portfolio-table th:nth-child(2) { width: 40% !important; }
        .portfolio-table th:nth-child(3) { width: 15% !important; }
        .portfolio-table th:nth-child(4) { width: 15% !important; }
        .portfolio-table th:nth-child(5) { width: 12% !important; }
        .portfolio-table th:nth-child(6) { width: 100px !important; }
        
        .portfolio-table img {
            width: 45px;
            height: 45px;
        }
        
        .portfolio-title {
            font-size: 0.85rem;
        }
        
        .portfolio-description {
            font-size: 0.75rem;
        }
        
        .action-buttons {
            height: auto;
            padding: 0;
        }
        
        .action-buttons .btn {
            padding: 4px 8px;
            font-size: 0.75rem;
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
            <div class="table-container">
                <table class="table table-hover portfolio-table">
                    <thead>
                        <tr>
                            <th style="width: 80px;">Gambar</th>
                            <th style="width: 35%;">Judul</th>
                            <th style="width: 15%;">Kategori</th>
                            <th style="width: 15%;">Klien</th>
                            <th style="width: 12%;">Tanggal</th>
                            <th style="width: 120px;">Aksi</th>
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
                                    <span class="fw-semibold text-dark" style="font-size: 0.85rem;">{{ $portfolio->client ?? '-' }}</span>
                                </td>
                                <td>
                                    @if($portfolio->project_date)
                                        <span class="badge date-badge">{{ $portfolio->project_date->format('d/m/Y') }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.portfolios.show', $portfolio) }}" class="btn btn-sm btn-info" title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" 
                                                onclick="showDeleteConfirm({{ $portfolio->id }}, '{{ addslashes($portfolio->title) }}')" 
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

<!-- Custom Delete Confirmation Modal -->
<div id="deleteConfirmModal" class="delete-modal-overlay" style="display: none;">
    <div class="delete-modal-container">
        <div class="delete-modal-content">
            <div class="delete-modal-header">
                <div class="delete-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3>Konfirmasi Hapus Portfolio</h3>
            </div>
            
            <div class="delete-modal-body">
                <p class="delete-message">Apakah Anda yakin ingin menghapus portfolio ini?</p>
                <div class="portfolio-info">
                    <strong id="portfolioNameToDelete"></strong>
                </div>
                <p class="warning-text">
                    <i class="fas fa-exclamation-triangle"></i>
                    Aksi ini tidak dapat dibatalkan!
                </p>
            </div>
            
            <div class="delete-modal-footer">
                <button type="button" class="btn-cancel" onclick="hideDeleteConfirm()">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button type="button" class="btn-delete" onclick="executeDelete()">
                    <i class="fas fa-trash"></i> Ya, Hapus!
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    let currentPortfolioId = null;
    let currentPortfolioTitle = null;
    
    function showDeleteConfirm(portfolioId, portfolioTitle) {
        currentPortfolioId = portfolioId;
        currentPortfolioTitle = portfolioTitle;
        
        // Update modal content
        document.getElementById('portfolioNameToDelete').textContent = '"' + portfolioTitle + '"';
        
        // Show modal
        const modal = document.getElementById('deleteConfirmModal');
        modal.style.display = 'flex';
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
        
        // Focus on cancel button for accessibility
        setTimeout(() => {
            modal.querySelector('.btn-cancel').focus();
        }, 100);
    }
    
    function hideDeleteConfirm() {
        const modal = document.getElementById('deleteConfirmModal');
        modal.style.display = 'none';
        
        // Restore body scroll
        document.body.style.overflow = 'auto';
        
        // Clear data
        currentPortfolioId = null;
        currentPortfolioTitle = null;
    }
    
    function executeDelete() {
        if (!currentPortfolioId) return;
        
        // Show loading state
        const deleteBtn = document.querySelector('.btn-delete');
        const originalText = deleteBtn.innerHTML;
        deleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';
        deleteBtn.disabled = true;
        
        // Create and submit form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/admin/portfolios/' + currentPortfolioId;
        
        // Add CSRF token
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        form.appendChild(csrfToken);
        
        // Add DELETE method
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        form.appendChild(methodField);
        
        // Add to body and submit
        document.body.appendChild(form);
        form.submit();
    }
    
    // Close modal when clicking outside
    document.addEventListener('click', function(e) {
        const modal = document.getElementById('deleteConfirmModal');
        if (e.target === modal) {
            hideDeleteConfirm();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('deleteConfirmModal');
            if (modal.style.display === 'flex') {
                hideDeleteConfirm();
            }
        }
    });
</script>
@endsection