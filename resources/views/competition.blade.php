

<article class="competition-card h-100 d-flex flex-column">
    <div class="card-visual grad-{{ $item['accent'] }}">
        <div class="d-flex justify-content-between align-items-start position-relative">
            <span class="glass-pill">{{ $item['category'] }}</span>
            <span class="glass-icon"><i class="bi bi-{{ $item['icon'] }}"></i></span>
        </div>
        <div class="card-prize">
            <p class="prize-label mb-0">Prize pool</p>
            <p class="prize-value mb-0">{{ $item['prize'] }}</p>
        </div>
    </div>

    <div class="p-4 d-flex flex-column flex-grow-1">
        <h3 class="card-title-suki">{{ $item['title'] }}</h3>
        <p class="card-text-suki flex-grow-1">{{ $item['description'] }}</p>

        <div class="card-meta d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center gap-2"><i class="bi bi-clock"></i> {{ $item['deadline'] }}</span>
            <span class="d-flex align-items-center gap-2"><i class="bi bi-people"></i> {{ $item['participants'] }}</span>
        </div>

        <a href="{{ $item['url'] ?? '#' }}" class="btn-view stretched-link">
            View challenge <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</article>