@extends('website.layout')

@section('title', 'Artikel & Wawasan Digital | PT Solusi Koneksi Anda')

@section('content')

@include('website.partials.page-hero', [
    'badge' => 'ARTIKEL & WAWASAN',
    'title' => 'Wawasan Teknologi untuk Dunia Bisnis',
    'text'  => 'Informasi dan wawasan seputar teknologi informasi, sistem digital, dan perkembangan bisnis.',
])

{{-- DAFTAR ARTIKEL --}}
<section class="py-5">
    <div class="container py-lg-4">
        <div class="mb-4">
            <span class="small fw-bold text-uppercase"
                  style="color:#b07a00;letter-spacing:1.5px;">
                Publikasi SKA
            </span>

            <h2 class="section-title mt-2 mb-2">Artikel Terbaru</h2>

            <p class="text-secondary mb-0">
                Informasi dan pembahasan yang relevan dengan kebutuhan digital.
            </p>
        </div>

        <div class="row g-4">
            @forelse($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <article class="ska-card h-100 bg-white overflow-hidden">
                        @if($article->image)
                            <img
                                src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($article->image) }}"
                                alt="{{ $article->title }}"
                                class="w-100"
                                style="height:230px;object-fit:cover;"
                                loading="lazy"
                            >
                        @else
                            <div class="d-flex align-items-center justify-content-center"
                                 style="height:190px;background:#edf4fc;color:#123b66;">
                                <span style="font-size:3rem;">◇</span>
                            </div>
                        @endif

                        <div class="p-4 d-flex flex-column">
                            @if($article->category)
                                <div class="mb-2">
                                    <span class="badge rounded-pill px-3 py-2"
                                          style="background:#edf4fc;color:#123b66;">
                                        {{ $article->category }}
                                    </span>
                                </div>
                            @endif

                            <h4 class="fw-bold mb-3">
                                <a href="{{ route('articles.show', $article->slug) }}"
                                class="text-decoration-none" style="color:#123b66;">
                                    {{ $article->title }}
                                </a>
                            </h4>

                            <p class="text-secondary mb-3" style="line-height:1.8;">
                                {{ $article->excerpt }}
                            </p>

                            <a href="{{ route('articles.show', $article->slug) }}"
                            class="text-decoration-none fw-semibold small mt-auto" style="color:#123b66;">
                                Baca selengkapnya →
                            </a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="rounded-4 p-5 text-center"
                         style="background:#f4f7fb;">
                        <h4 class="fw-bold" style="color:#123b66;">
                            Artikel Sedang Dipersiapkan
                        </h4>

                        <p class="text-secondary mb-0">
                            Artikel dan wawasan terbaru akan ditampilkan di halaman ini.
                        </p>
                    </div>
                </div>
                        @endforelse
                        </div>

                        <div class="mt-4 d-flex justify-content-center">
                            {{ $articles->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </section>

{{-- TOPIK --}}

{{-- TOPIK --}}
<section class="py-5" style="background:#f7f9fc;">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <span class="small fw-bold text-uppercase"
                  style="color:#b07a00;letter-spacing:1.5px;">
                Topik Pilihan
            </span>

            <h2 class="section-title mt-2 mb-2">
                Mengenal Dunia Digital
            </h2>

            <p class="text-secondary">
                Beberapa bidang yang relevan dengan layanan teknologi informasi.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-white border rounded-4 p-4 h-100">
                    <div class="rounded-3 d-flex align-items-center justify-content-center mb-3"
                         style="width:50px;height:50px;background:#edf4fc;color:#123b66;font-size:1.5rem;">
                        &lt;/&gt;
                    </div>

                    <h5 class="fw-bold" style="color:#123b66;">
                        Pengembangan Website
                    </h5>

                    <p class="text-secondary mb-0" style="line-height:1.8;">
                        Memahami peran website dalam penyampaian informasi,
                        pelayanan pelanggan, dan pengembangan bisnis.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white border rounded-4 p-4 h-100">
                    <div class="rounded-3 d-flex align-items-center justify-content-center mb-3"
                         style="width:50px;height:50px;background:#fff4d7;color:#805600;font-size:1.5rem;">
                        ◈
                    </div>

                    <h5 class="fw-bold" style="color:#123b66;">
                        Sistem Informasi
                    </h5>

                    <p class="text-secondary mb-0" style="line-height:1.8;">
                        Mengenal pemanfaatan sistem digital untuk membantu
                        pengelolaan data dan proses operasional.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white border rounded-4 p-4 h-100">
                    <div class="rounded-3 d-flex align-items-center justify-content-center mb-3"
                         style="width:50px;height:50px;background:#edf4fc;color:#123b66;font-size:1.5rem;">
                        ↗
                    </div>

                    <h5 class="fw-bold" style="color:#123b66;">
                        Transformasi Digital
                    </h5>

                    <p class="text-secondary mb-0" style="line-height:1.8;">
                        Memahami bagaimana teknologi dapat mendukung
                        perubahan cara kerja bisnis dan organisasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5">
    <div class="container py-lg-3">
        <div class="rounded-4 p-4 p-lg-5 text-center"
             style="background:#123b66;color:white;">
            <h2 class="fw-bold mb-3">
                Butuh Solusi Teknologi untuk Bisnis Anda?
            </h2>

            <p class="mx-auto mb-4"
               style="max-width:650px;color:#d8e3f0;line-height:1.8;">
                Hubungi kami untuk mendiskusikan kebutuhan website,
                sistem informasi, atau solusi digital lainnya.
            </p>

            <a href="{{ route('contact') }}"
               class="btn btn-lg"
               style="background:#f4b942;color:#123b66;font-weight:700;">
                Hubungi Kami →
            </a>
        </div>
    </div>
</section>

@endsection