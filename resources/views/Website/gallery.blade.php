@extends('website.layout')

@section('title', 'Galeri & Portofolio | PT Solusi Koneksi Anda')

@section('content')

@include('website.partials.page-hero', [
    'badge' => 'GALERI KEGIATAN',
    'title' => 'Dokumentasi dan Aktivitas Kami',
    'text'  => 'Dokumentasi kegiatan, proses kerja, dan proyek yang menggambarkan penerapan solusi teknologi informasi.',
])

{{-- GALERI --}}
<section class="py-5">
    <div class="container py-lg-4">
        <div class="mb-4">
            <span class="small fw-bold text-uppercase"
                  style="color:#b07a00;letter-spacing:1.5px;">
                Dokumentasi
            </span>

            <h2 class="section-title mt-2 mb-2">
                Galeri Kegiatan & Proyek
            </h2>

            <p class="text-secondary mb-0">
                Kumpulan dokumentasi yang tersimpan dalam galeri perusahaan.
            </p>
        </div>

        <div class="row g-4">
            @forelse($galleries as $gallery)
                <div class="col-md-6 col-lg-4">
                    <article class="ska-card bg-white h-100 overflow-hidden">
                        @if($gallery->image)
                            <img
                                src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($gallery->image) }}"
                                alt="{{ $gallery->title }}"
                                class="w-100"
                                style="height:250px;object-fit:cover;"
                                loading="lazy"
                            >
                        @else
                            <div class="d-flex align-items-center justify-content-center"
                                 style="height:250px;background:#edf4fc;color:#123b66;">
                                <span style="font-size:3rem;">◇</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <span class="small fw-semibold text-uppercase"
                                style="color:#b07a00;">
                                {{ $gallery->category ?: 'Dokumentasi SKA' }}
                            </span>

                            @if($gallery->activity_date)
                                <span class="small text-secondary ms-2">
                                    {{ \Carbon\Carbon::parse($gallery->activity_date)->format('d/m/Y') }}
                                </span>
                            @endif

                            <h4 class="fw-bold mt-2 mb-3"
                                style="color:#123b66;">
                                {{ $gallery->title }}
                            </h4>

                            @if($gallery->description)
                                <p class="text-secondary mb-0"
                                   style="line-height:1.8;">
                                    {{ $gallery->description }}
                                </p>
                            @endif
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="rounded-4 p-5 text-center"
                         style="background:#f4f7fb;">
                        <h4 class="fw-bold" style="color:#123b66;">
                            Galeri Sedang Dipersiapkan
                        </h4>

                        <p class="text-secondary mb-0">
                            Dokumentasi kegiatan dan proyek akan ditampilkan
                            setelah tersedia di galeri perusahaan.
                        </p>
                    </div>
                </div>
                        @endforelse
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        {{ $galleries->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </section>

{{-- INFORMASI --}}

{{-- INFORMASI --}}
<section class="py-5" style="background:#f7f9fc;">
    <div class="container py-lg-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="small fw-bold text-uppercase"
                      style="color:#b07a00;letter-spacing:1.5px;">
                    Tentang Dokumentasi
                </span>

                <h2 class="section-title mt-2 mb-3">
                    Setiap Proses Memiliki Cerita
                </h2>

                <p class="text-secondary mb-0" style="line-height:1.9;">
                    Dokumentasi membantu memperlihatkan proses, aktivitas,
                    dan hasil pekerjaan. Melalui galeri ini, pengunjung dapat
                    mengenal lebih jauh kegiatan yang ditampilkan oleh
                    PT Solusi Koneksi Anda.
                </p>
            </div>

            <div class="col-lg-5">
                <div class="bg-white rounded-4 border p-4">
                    <h5 class="fw-bold mb-3" style="color:#123b66;">
                        Apa yang Bisa Ditampilkan?
                    </h5>

                    <div class="d-flex gap-3 mb-3">
                        <span class="fw-bold" style="color:#c38c18;">01</span>
                        <span class="text-secondary">Dokumentasi kegiatan perusahaan</span>
                    </div>

                    <div class="d-flex gap-3 mb-3">
                        <span class="fw-bold" style="color:#c38c18;">02</span>
                        <span class="text-secondary">Proses pengembangan sistem digital</span>
                    </div>

                    <div class="d-flex gap-3">
                        <span class="fw-bold" style="color:#c38c18;">03</span>
                        <span class="text-secondary">Portofolio dan hasil pekerjaan</span>
                    </div>
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
                Ingin Berdiskusi tentang Proyek Anda?
            </h2>

            <p class="mx-auto mb-4"
               style="max-width:650px;color:#d8e3f0;line-height:1.8;">
                Hubungi kami untuk mendiskusikan kebutuhan website,
                sistem informasi, dan solusi digital untuk bisnis Anda.
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