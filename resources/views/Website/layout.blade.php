<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PT Solusi Koneksi Anda')</title>
    <meta name="description" content="PT Solusi Koneksi Anda berfokus pada layanan teknologi informasi dan pengembangan sistem, termasuk website, sistem informasi, dan pengelolaan data.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --ska-primary: #123b66;
            --ska-accent: #f4b942;
            --ska-light: #f4f7fb;
        }
        body { color: #243247; }
        .navbar-brand { font-weight: 800; letter-spacing: .3px; }
        .navbar-brand span { color: var(--ska-accent); }
        .btn-ska {
            background: var(--ska-primary);
            color: white;
            border-radius: 8px;
            padding: 11px 22px;
        }
        .btn-ska:hover { background: #0b2949; color: white; }
        .hero { background: var(--ska-light); padding: 90px 0; }
        .section-space { padding: 70px 0; }
        .section-title { color: var(--ska-primary); font-weight: 800; }
        .ska-card {
            border: 1px solid #e7ebf0;
            border-radius: 14px;
            height: 100%;
            overflow: hidden;
            transition: transform .2s;
        }
        .ska-card:hover { transform: translateY(-4px); }
        .ska-card img {
            width: 100%; height: 210px; object-fit: cover;
        }


        .footer {
            background: #102b48;
            color: #eaf0f7;
            padding: 48px 0 20px;
        }

        .footer a {
            color: #d3deea;
            text-decoration: none;
            transition: color .2s ease;
        }

        .footer a:hover {
            color: #f4b942;
        }

        .footer .footer-brand {
            display: inline-block;
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: .3px;
            color: #fff;
            margin-bottom: 14px;
        }

        .footer .footer-brand span {
            color: #f4b942;
        }

        .footer h6 {
            font-size: .95rem;
            margin: 8px 0 20px;
        }

        .footer-description {
            max-width: 300px;
            color: #b9c8d8;
            line-height: 1.8;
            font-size: .92rem;
        }

        .footer-links {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            font-size: .92rem;
            color: #c3cfdd;
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 18px;
            color: #c3cfdd;
            font-size: .92rem;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .footer-icon {
            flex: 0 0 20px;
            color: #f4b942;
            font-size: 1rem;
            text-align: center;
        }

        .footer-divider {
            border-color: rgba(255, 255, 255, .16);
            margin: 28px 0 18px;
        }

        .footer-bottom {
            color: #aebfd0;
            font-size: .82rem;
        }

        @media (max-width: 767.98px) {
            .footer {
                padding-top: 36px;
            }

            .footer-description {
                max-width: 100%;
            }

            .footer h6 {
                margin-bottom: 14px;
            }
        }

    
    /* ===== Ukuran teks lebih kompak ===== */
html { font-size: 15px; }

.display-4 { font-size: clamp(1.9rem, 1rem + 3vw, 2.7rem); line-height: 1.2; }
.display-5 { font-size: clamp(1.7rem, 1rem + 2.2vw, 2.25rem); line-height: 1.25; }
.display-6 { font-size: clamp(1.5rem, 1rem + 1.6vw, 1.9rem); }

h2 { font-size: clamp(1.4rem, 1rem + 1vw, 1.75rem); }
h3 { font-size: 1.3rem; }
h4 { font-size: 1.15rem; }
h5 { font-size: 1.05rem; }

.fs-5 { font-size: 1.02rem !important; }
.btn-lg { font-size: 1rem; padding: .65rem 1.4rem; }

/* ===== Hero halaman dalam (selaras dengan beranda) ===== */
.page-hero{position:relative;color:#fff;padding:72px 0;text-align:center;overflow:hidden;
    background:linear-gradient(135deg,#0d2a4a 0%,#123b66 55%,#1c5688 100%);
    background-size:cover;background-position:center}
.page-hero.has-photo::before{content:"";position:absolute;inset:0;
    background:linear-gradient(180deg,rgba(10,30,56,.78),rgba(10,30,56,.9))}
.page-hero .container{position:relative}
.page-hero p{color:#d8e3f0}
@media (max-width:767.98px){.page-hero{padding:56px 0}}

</style>

    </head>

<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
        @php
    $brand = $company ?? \App\Models\CompanyProfile::first();
@endphp

<a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
    @if($brand?->logo)
        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($brand->logo) }}"
             alt="Logo {{ $brand->company_name ?: 'perusahaan' }}"
             style="height:36px;width:auto;max-width:120px;object-fit:contain;">
    @endif
    <span class="{{ $brand?->logo ? 'd-none d-sm-inline' : '' }}">SKA<span>.</span></span>
</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSka" aria-controls="navbarSka"
            aria-expanded="false" aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSka">
        <ul class="navbar-nav ms-auto gap-lg-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">Profil Perusahaan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products') }}">Produk & Layanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles') }}">Artikel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('gallery') }}">Galeri Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
            </li>
        </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <div class="row g-4">

            {{-- Profil Perusahaan --}}
            <div class="col-lg-5 col-md-6">
                <a href="{{ route('home') }}" class="footer-brand">
                    @if($brand?->logo)
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($brand->logo) }}"
                            alt="{{ $brand->company_name ?: 'Logo perusahaan' }}"
                            style="height:44px;width:auto;max-width:200px;object-fit:contain;
                                    background:#fff;padding:6px 10px;border-radius:8px;">
                    @else
                        SKA<span>.</span>
                    @endif
                </a>

                <h5 class="fw-bold mb-3">PT Solusi Koneksi Anda</h5>

                <p class="footer-description mb-3">
                    PT Solusi Koneksi Anda berfokus pada layanan teknologi
                    informasi dan pengembangan sistem untuk mendukung kebutuhan
                    digital organisasi melalui website, sistem informasi,
                    dan pengelolaan data.
                </p>

                <a href="{{ route('profile') }}" class="small">
                    Tentang perusahaan <span aria-hidden="true">&rarr;</span>
                </a>
            </div>

            {{-- Navigasi --}}
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-white">Navigasi</h6>

                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('profile') }}">Profil Perusahaan</a></li>
                    <li><a href="{{ route('products') }}">Produk & Layanan</a></li>
                    <li><a href="{{ route('articles') }}">Artikel</a></li>
                    <li><a href="{{ route('gallery') }}">Galeri Kegiatan</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div class="col-lg-4 col-md-12">
                <h6 class="fw-bold text-white">Hubungi Kami</h6>

                @php
                    $footerCompany = \App\Models\CompanyProfile::first();
                @endphp

                <div class="footer-contact-item">
                <span class="footer-icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </span>
                <div>
                    {{ $footerCompany?->address ?: 'Informasi alamat belum tersedia.' }}
                </div>
            </div>

            <div class="footer-contact-item">
                <span class="footer-icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
                </span>
                <div>
                    @if ($footerCompany?->phone)
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $footerCompany->phone) }}">
                            {{ $footerCompany->phone }}
                        </a>
                    @else
                        Informasi telepon belum tersedia.
                    @endif
                </div>
            </div>

            <div class="footer-contact-item">
                <span class="footer-icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg>
                </span>
                <div>
                    @if ($footerCompany?->email)
                        <a href="mailto:{{ $footerCompany->email }}">
                            {{ $footerCompany->email }}
                        </a>
                    @else
                        Informasi email belum tersedia.
                    @endif
                </div>
            </div>

        </div>

        {{-- Hak Cipta --}}
        <hr class="footer-divider">

        <div class="footer-bottom d-flex flex-column flex-md-row
                    justify-content-between align-items-md-center gap-2">
            <span>
                &copy; {{ date('Y') }} PT Solusi Koneksi Anda.
                Hak cipta dilindungi.
            </span>

            <span class="d-flex gap-3">
                <a href="{{ route('contact') }}">Hubungi kami</a>
                <a href="{{ url('/admin') }}">Login Admin</a>
            </span>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>