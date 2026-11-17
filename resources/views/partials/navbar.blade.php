@php
    // Anchors point to the home page so the links also work from other pages.
    $home = url('/');
    $links = [
        'Competitions'      => $home . '#competitions',
        'Winner Highlights' => $home . '#winners',
        'Organizations'     => $home . '#organizations',
        'About us'          => $home . '#about',
        'FAQs'              => $home . '#faqs',
    ];
    $profileUrl = Route::has('login') ? route('login') : '#';
@endphp

<header class="site-header sticky-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ $home }}" aria-label="SUKI home">
                <span class="brand-mark"><i class="bi bi-stars"></i></span>
                <span class="brand-text">SUKI</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNav" aria-controls="mainNav"
                    aria-expanded="false" aria-label="Toggle navigation menu">
                <i class="bi bi-list fs-2"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto gap-lg-4 py-3 py-lg-0">
                    @foreach ($links as $label => $href)
                        <li class="nav-item">
                            <a class="nav-link nav-link-suki" href="{{ $href }}">{{ $label }}</a>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ $profileUrl }}" class="btn-profile d-inline-flex align-items-center gap-2">
                    <i class="bi bi-person"></i> Profile
                </a>
            </div>
        </div>
    </nav>
</header>

@push('scripts')
<script>
    // Close the mobile menu after tapping a link
    document.querySelectorAll('#mainNav .nav-link').forEach(function (link) {
        link.addEventListener('click', function () {
            var menu = document.getElementById('mainNav');
            if (menu.classList.contains('show')) {
                bootstrap.Collapse.getOrCreateInstance(menu).hide();
            }
        });
    });
</script>
@endpush