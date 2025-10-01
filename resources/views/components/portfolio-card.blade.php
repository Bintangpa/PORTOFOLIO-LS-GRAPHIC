@props(['portfolio'])

<div class="portfolio-card">
    @if($portfolio->category)
        <span class="badge-category">{{ $portfolio->category }}</span>
    @endif
    <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="{{ $portfolio->title }}">
    <div class="portfolio-card-body">
        <h5 class="text-dark">{{ $portfolio->title }}</h5>
        <p>{{ Str::limit($portfolio->description, 80) }}</p>
        @if($portfolio->client)
            <small class="text-muted"><i class="fas fa-user-tie"></i> {{ $portfolio->client }}</small>
        @endif
    </div>
</div>