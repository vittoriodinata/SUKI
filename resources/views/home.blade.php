@extends('layouts.app')

@section('title', 'SUKI | University competitions')

@section('content')

{{-- ============ HERO ============ --}}
<section id="home" class="hero">
    <div class="hero-grid"></div>
    <div class="hero-glow"></div>

    <div class="container position-relative">
        <div class="row align-items-center g-5 hero-row">
            <div class="col-lg-7">
                <span class="badge-new">
                    <span class="badge-dot"></span> New competition just launched
                </span>

                <h1 class="hero-title">
                    Where bright minds <span class="text-accent">compete, connect</span> and create.
                </h1>

                <p class="hero-lead">
                    Discover university competitions, put your skills to the test, and turn
                    ambitious ideas into real-world impact.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="#competitions" class="btn-suki d-inline-flex align-items-center gap-2">
                        Explore competitions <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="#about" class="btn-suki-outline">How it works</a>
                </div>

                <div class="hero-stats d-flex align-items-center">
                    @foreach ($stats as $stat)
                        <div class="stat">
                            <strong>{{ $stat['value'] }}</strong>
                            {{ $stat['label'] }}
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-5">
                <div class="featured-wrap mx-auto">
                    <div class="deco-square"></div>
                    <div class="deco-circle"></div>

                    <article class="featured-card">
                        <div class="featured-visual">
                            <div class="orb orb-one"></div>
                            <div class="orb orb-two"></div>
                            <div class="position-relative" style="z-index:1">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="glass-pill glass-pill-caps">Featured</span>
                                    <i class="bi bi-stars featured-star"></i>
                                </div>
                                <p class="featured-host">{{ $featured['host'] }}</p>
                                <h2 class="featured-title">{{ $featured['title'] }}</h2>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="d-flex flex-wrap column-gap-4 row-gap-2 featured-meta">
                                <span><i class="bi bi-calendar3"></i> Deadline {{ $featured['deadline'] }}</span>
                                <span><i class="bi bi-people"></i> {{ $featured['participants'] }} joined</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between featured-foot">
                                <div>
                                    <p class="prize-label-dark mb-0">Prize pool</p>
                                    <p class="featured-prize mb-0">{{ $featured['prize'] }}</p>
                                </div>
                                <a href="{{ $featured['url'] }}" class="round-arrow" aria-label="View competition">
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ COMPETITIONS ============ --}}
<section id="competitions" class="section-pad">
    <div class="container">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-end gap-3">
            <div>
                <p class="eyebrow">Open now</p>
                <h2 class="section-title">Find your next challenge</h2>
                <p class="section-lead">
                    Compete with talented students from around the world and show what you can do.
                </p>
            </div>
            <a href="#" class="link-view-all d-none d-sm-inline-flex align-items-center gap-2">
                View all competitions <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        {{-- Category filters are built from the data, so new categories appear automatically --}}
        <div class="filter-bar d-flex gap-2" role="tablist" aria-label="Filter competitions by category">
            <button type="button" class="filter-pill active" data-filter="All">All</button>
            @foreach (collect($competitions)->pluck('category')->unique() as $category)
                <button type="button" class="filter-pill" data-filter="{{ $category }}">{{ $category }}</button>
            @endforeach
        </div>

        <div class="row g-4 mt-1" id="competitionGrid">
            @foreach ($competitions as $item)
                <div class="col-md-6 col-lg-4" data-category="{{ $item['category'] }}">
                    @include('competition', ['item' => $item])
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ WINNERS ============ --}}
<section id="winners" class="section-pad section-tint">
    <div class="container">
        <div class="text-center">
            <p class="eyebrow">Hall of excellence</p>
            <h2 class="section-title">Meet our latest winners</h2>
            <p class="section-lead mx-auto">
                Celebrating students who dared to think differently and turned their vision into
                something remarkable.
            </p>
        </div>

        <div class="row g-4 mt-4">
            @foreach ($winners as $winner)
                <div class="col-md-4">
                    @include('winnerhighlight', ['winner' => $winner, 'rank' => $loop->iteration])
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ ORGANIZATIONS ============ --}}
<section id="organizations" class="section-pad-sm">
    <div class="container">
        <p class="text-center trusted-label">Trusted by leading universities &amp; organizations</p>

        <div class="row row-cols-2 row-cols-md-5 g-3 mt-3">
            @foreach ($organizations as $org)
                <div class="col">
                    <div class="org-tile">
                        <span class="org-dot" style="background: {{ $org['color'] }}"></span>
                        {{ $org['name'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ ABOUT / CTA ============ --}}
<section id="about" class="pb-5 px-3">
    <div class="container cta-container">
        <div class="cta-panel text-center">
            <div class="cta-ring"></div>
            <div class="cta-blob"></div>
            <div class="position-relative">
                <span class="cta-icon"><i class="bi bi-stars"></i></span>
                <h2 class="cta-title">Ready to put your ideas to the test?</h2>
                <p class="cta-text mx-auto">
                    Join thousands of university students learning, building, and making an impact
                    through meaningful competition.
                </p>
                <a href="#competitions" class="btn-cta d-inline-flex align-items-center gap-2">
                    Browse competitions <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Client-side category filter (no page reload)
    (function () {
        var pills = document.querySelectorAll('.filter-pill');
        var items = document.querySelectorAll('#competitionGrid [data-category]');

        pills.forEach(function (pill) {
            pill.addEventListener('click', function () {
                var filter = pill.dataset.filter;
                pills.forEach(function (p) { p.classList.toggle('active', p === pill); });
                items.forEach(function (item) {
                    item.classList.toggle('d-none', filter !== 'All' && item.dataset.category !== filter);
                });
            });
        });
    })();
</script>
@endpush