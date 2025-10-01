@props(['type' => 'info', 'message'])

@php
    $icons = [
        'success' => 'fa-check-circle',
        'error' => 'fa-exclamation-circle',
        'warning' => 'fa-exclamation-triangle',
        'info' => 'fa-info-circle'
    ];
    $icon = $icons[$type] ?? $icons['info'];
@endphp

<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    <i class="fas {{ $icon }}"></i> {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>