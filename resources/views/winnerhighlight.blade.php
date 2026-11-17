

<article class="winner-card h-100">
    <span class="winner-rank">{{ str_pad($rank, 2, '0', STR_PAD_LEFT) }}</span>

    <div class="winner-avatar tone-{{ $winner['tone'] }}">{{ $winner['initials'] }}</div>
    <h3 class="winner-name">{{ $winner['name'] }}</h3>
    <p class="winner-uni">{{ $winner['university'] }}</p>

    <div class="winner-comp d-flex align-items-center gap-2">
        <i class="bi bi-trophy"></i> {{ $winner['competition'] }}
    </div>
</article>