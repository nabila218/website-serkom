@extends('website.layout')

@section('title', 'Beranda | PT Solusi Koneksi Anda')

@section('content')

@php
    $heroPhoto = file_exists(public_path('images/hero.JPG'));
@endphp

<style>
    .hm-hero{position:relative;color:#fff;padding:90px 0 150px;overflow:hidden;
        background:linear-gradient(135deg,#0d2a4a 0%,#123b66 55%,#1c5688 100%)}
    .hm-hero.has-photo{background-size:cover;background-position:center}
    .hm-hero.has-photo::before{content:"";position:absolute;inset:0;
        background:linear-gradient(180deg,rgba(10,30,56,.78),rgba(10,30,56,.9))}
    .hm-hero .container{position:relative}
    .hm-strip-wrap{margin-top:-85px;position:relative;z-index:2}
    .hm-strip{background:#fff;border-radius:14px;overflow:hidden;
        box-shadow:0 20px 40px -22px rgba(15,42,74,.4);
        display:grid;grid-template-columns:repeat(4,1fr)}
    .hm-item{padding:28px 16px;text-align:center;text-decoration:none;color:#123b66;transition:background .2s,color .2s}
    .hm-item .hm-ic{display:block;font-size:1.8rem;margin-bottom:8px;color:#c38c18}
    .hm-item small{display:block;color:#6b7a8d;margin-top:2px}
    .hm-dark{background:#0d2a4a;color:#fff}
    .hm-box{border:1px solid rgba(255,255,255,.25);border-radius:10px;padding:24px;height:100%;transition:border-color .2s}
    .hm-box:hover{border-color:#f4b942}
    .hm-box .n{color:#f4b942;font-weight:800;font-size:1.5rem}
    .hm-point{border-left:4px solid #f4b942;padding-left:16px;margin-bottom:22px}
    @media (max-width:767.98px){
        .hm-hero{padding:64px 0 130px}
        .hm-strip{grid-template-columns:repeat(2,1fr)}
    }
</style>

{{-- HERO --}}
<section class="hm-hero {{ $heroPhoto ? 'has-photo' : '' }}"
         @if($heroPhoto) style="background-image:url('{{ asset('images/hero.JPG') }}')" @endif>
    <div class="container text-center">
        <span class="badge rounded-pill mb-3 px-3 py-2"
              style="background:#fff0c2;color:#805600;">
            SOLUSI TEKNOLOGI UNTUK BISNIS
        </span>

        <h1 class="display-4 fw-bold mb-3 mx-auto" style="max-width:860px;">
            Solusi Teknologi Informasi untuk Kebutuhan Bisnis Anda
        </h1>

        <p class="mx-auto mb-4" style="max-width:640px;color:#d8e3f0;line-height:1.8;">
            {{ $company?->tagline ?: 'PT Solusi Koneksi Anda mengembangkan website, sistem informasi, dan pengelolaan data untuk membantu organisasi menyajikan informasi dengan lebih baik.' }}
        </p>

        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('products') }}" class="btn btn-lg"
               style="background:#f4b942;color:#123b66;font-weight:700;">
                Jelajahi Layanan
            </a>
            <a href="{{ route('contact') }}" class="btn btn-lg btn-outline-light">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

{{-- KARTU LAYANAN --}}
<div class="hm-strip-wrap">
    <div class="container">
        <div class="hm-strip">
            <div class="hm-item">
                <span class="hm-ic" aria-hidden="true">&lt;/&gt;</span>
                <strong>Website</strong>
                <small>Perusahaan, sekolah, organisasi</small>
            </div>
            <div class="hm-item">
                <span class="hm-ic" aria-hidden="true">◈</span>
                <strong>Sistem Informasi</strong>
                <small>Pendataan dan pelaporan</small>
            </div>
            <div class="hm-item">
                <span class="hm-ic" aria-hidden="true">✎</span>
                <strong>Desain UI/UX</strong>
                <small>Antarmuka mudah dipakai</small>
            </div>
            <div class="hm-item">
                <span class="hm-ic" aria-hidden="true">▤</span>
                <strong>Basis Data</strong>
                <small>Struktur dan pengelolaan data</small>
            </div>
        </div>
    </div>
</div>

{{-- TENTANG SINGKAT --}}
<section class="py-5 bg-white">
    <div class="container py-lg-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="section-title mb-3">Teknologi yang Berangkat dari Kebutuhan Anda</h2>
                <p class="text-secondary" style="line-height:1.9;">
                    Setiap pengembangan diawali dengan memahami kebutuhan pengguna. Kebutuhan itu menjadi dasar
                    untuk merancang fitur, menyusun struktur data, dan menguji fungsi sistem sebelum digunakan.
                </p>
                <a href="{{ route('profile') }}" class="btn btn-ska">Tentang Perusahaan</a>
            </div>

            <div class="col-lg-6">
                <div class="hm-point">
                    <h5 class="fw-bold mb-1" style="color:#123b66;">Pengembangan Sesuai Kebutuhan</h5>
                    <p class="text-secondary mb-0">Fitur dan struktur sistem dirancang berdasarkan tujuan penggunaan yang telah ditentukan.</p>
                </div>
                <div class="hm-point">
                    <h5 class="fw-bold mb-1" style="color:#123b66;">Pengelolaan Data Terstruktur</h5>
                    <p class="text-secondary mb-0">Data disusun agar informasi dapat disimpan, ditemukan, dan ditampilkan sesuai fungsi aplikasi.</p>
                </div>
                <div class="hm-point mb-0">
                    <h5 class="fw-bold mb-1" style="color:#123b66;">Pengujian Fungsional</h5>
                    <p class="text-secondary mb-0">Fitur diperiksa untuk memastikan fungsi utama berjalan sesuai hasil yang diharapkan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PRODUK DAN LAYANAN --}}
<section class="py-5" style="background:#f7f9fc;">
    <div class="container py-lg-4">
        <div class="row align-items-end mb-4 g-3">
            <div class="col-md-8">
                <span class="small fw-bold text-uppercase" style="color:#b07a00;letter-spacing:1.5px;">Apa yang Kami Kerjakan</span>
                <h2 class="section-title mt-2 mb-2">Produk & Layanan</h2>
                <p class="text-secondary mb-0">
                    Layanan untuk kebutuhan website, sistem informasi, perancangan antarmuka, dan pengelolaan data.
                </p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('products') }}" class="text-decoration-none fw-semibold" style="color:#123b66;">
                    Jelajahi semua layanan →
                </a>
            </div>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-md-6 col-lg-4">
                    <article class="ska-card bg-white h-100 overflow-hidden">
                        @if($product->image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($product->image) }}"
                                 alt="{{ $product->name }}" class="w-100"
                                 style="height:230px;object-fit:cover;" loading="lazy">
                        @else
                            <div class="d-flex align-items-center justify-content-center"
                                 style="height:180px;background:#edf4fc;color:#123b66;">
                                <span class="fs-1">◇</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <span class="small fw-semibold text-uppercase" style="color:#b07a00;">
                                {{ $product->category ?: 'Solusi SKA' }}
                            </span>
                            <h4 class="fw-bold mt-2 mb-3" style="color:#123b66;">{{ $product->name }}</h4>
                            <p class="text-secondary mb-0" style="line-height:1.8;">
                                {{ $product->short_description ?: $product->description }}
                            </p>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="bg-white rounded-4 p-5 text-center">
                        <h5 class="fw-bold" style="color:#123b66;">Layanan Kami</h5>
                        <p class="text-secondary mb-0">Informasi produk dan layanan akan segera tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- CARA KERJA (bagian biru tua) --}}
<section class="hm-dark py-5">
    <div class="container py-lg-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-4">
                <h2 class="fw-bold mb-3">Dari Kebutuhan Menjadi Solusi</h2>
                <p class="mb-0" style="color:#c9d6e8;line-height:1.8;">
                    Empat tahap yang jelas, sehingga Anda selalu tahu proyek sedang sampai di mana.
                </p>
            </div>

            <div class="col-lg-8">
                <div class="row g-3">
                    @foreach([
                        ['Memahami kebutuhan', 'Mengidentifikasi tujuan, pengguna, dan data yang dikelola.'],
                        ['Merancang solusi', 'Menyusun fitur, struktur data, dan desain antarmuka.'],
                        ['Membangun dan menguji', 'Mengembangkan sistem bertahap dan memeriksa fungsinya.'],
                        ['Mendampingi penggunaan', 'Menyerahkan sistem dan mendukung penerapannya.'],
                    ] as $i => $step)
                        <div class="col-md-6">
                            <div class="hm-box">
                                <div class="n">{{ $i + 1 }}</div>
                                <h5 class="fw-bold mt-1">{{ $step[0] }}</h5>
                                <p class="mb-0" style="color:#c9d6e8;line-height:1.7;">{{ $step[1] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ARTIKEL --}}
<section class="py-5 bg-white">
    <div class="container py-lg-4">
        <div class="row align-items-end mb-4 g-3">
            <div class="col-md-8">
                <span class="small fw-bold text-uppercase" style="color:#b07a00;letter-spacing:1.5px;">Wawasan Digital</span>
                <h2 class="section-title mt-2 mb-2">Artikel & Informasi</h2>
                <p class="text-secondary mb-0">
                    Penjelasan seputar pengembangan website, sistem informasi, database, dan pengujian perangkat lunak.
                </p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('articles') }}" class="text-decoration-none fw-semibold" style="color:#123b66;">
                    Baca semua artikel →
                </a>
            </div>
        </div>

        <div class="row g-4">
            @forelse($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <article class="ska-card h-100 bg-white overflow-hidden">
                        @if($article->image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($article->image) }}"
                                 alt="{{ $article->title }}" class="w-100"
                                 style="height:220px;object-fit:cover;" loading="lazy">
                        @endif

                        <div class="p-4">
                            @if($article->category)
                                <span class="badge rounded-pill mb-2" style="background:#edf4fc;color:#123b66;">
                                    {{ $article->category }}
                                </span>
                            @endif

                            <h4 class="fw-bold mt-2">
                                <a href="{{ route('articles.show', $article->slug) }}"
                                   class="text-decoration-none" style="color:#123b66;">
                                    {{ $article->title }}
                                </a>
                            </h4>

                            <p class="text-secondary mb-0" style="line-height:1.8;">{{ $article->excerpt }}</p>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center py-4">
                    <p class="text-secondary mb-0">Artikel terbaru akan segera ditampilkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- GALERI --}}
<section class="py-5" style="background:#f7f9fc;">
    <div class="container py-lg-4">
        <div class="mb-4">
            <span class="small fw-bold text-uppercase" style="color:#b07a00;letter-spacing:1.5px;">Dokumentasi</span>
            <h2 class="section-title mt-2 mb-2">Proyek & Galeri Kegiatan</h2>
            <p class="text-secondary mb-0">
                Dokumentasi proses perancangan, pengembangan, dan pengujian solusi digital.
            </p>
        </div>

        <div class="row g-4">
            @forelse($galleries as $gallery)
                <div class="col-md-6 col-lg-4">
                    <article class="ska-card bg-white h-100 overflow-hidden">
                        @if($gallery->image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($gallery->image) }}"
                                 alt="{{ $gallery->title }}" class="w-100"
                                 style="height:230px;object-fit:cover;" loading="lazy">
                        @else
                            <div class="d-flex align-items-center justify-content-center"
                                 style="height:230px;background:#edf4fc;color:#123b66;">
                                <span class="fs-1">◇</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <h5 class="fw-bold mb-2" style="color:#123b66;">{{ $gallery->title }}</h5>
                            @if($gallery->description)
                                <p class="text-secondary mb-0" style="line-height:1.8;">{{ $gallery->description }}</p>
                            @endif
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-secondary">Dokumentasi proyek dan kegiatan akan segera ditampilkan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            <a href="{{ route('gallery') }}" class="btn btn-ska">Lihat Semua Galeri</a>
        </div>
    </div>
</section>

{{-- AJAKAN --}}
<section class="py-5">
    <div class="container py-lg-4">
        <div class="rounded-4 p-4 p-lg-5 text-center" style="background:#123b66;color:white;">
            <h2 class="fw-bold mb-3">Diskusikan Kebutuhan Website dan Sistem Informasi Anda</h2>
            <p class="mb-4 mx-auto" style="max-width:650px;color:#d8e3f0;line-height:1.8;">
                Sampaikan kebutuhan website, aplikasi, atau pengelolaan data yang ingin dikembangkan.
                Gunakan formulir kontak untuk menjelaskan tujuan Anda.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-lg"
               style="background:#f4b942;color:#123b66;font-weight:700;">
                Hubungi Kami →
            </a>
        </div>
    </div>
</section>

@endsection