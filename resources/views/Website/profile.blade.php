@extends('website.layout')

@section('title', 'Profil Perusahaan | ' . ($company?->company_name ?: 'PT Solusi Koneksi Anda'))

@section('content')

@php
    $name = $company?->company_name ?: 'PT Solusi Koneksi Anda';

    // Pecah teks admin per baris kosong / per baris
    $aboutParagraphs = collect(preg_split('/\R+/', trim($company?->about ?? '')))
        ->map('trim')->filter()->values();
    if ($aboutParagraphs->isEmpty()) {
        $aboutParagraphs = collect([
            'Perkembangan teknologi membuka peluang bagi bisnis dan organisasi untuk bekerja lebih efektif dan mengelola informasi dengan lebih baik.',
            'PT Solusi Koneksi Anda berorientasi pada kebutuhan pelanggan, dengan fokus pada pengembangan website, sistem informasi, dan integrasi solusi digital.',
        ]);
    }

    $vision = $company?->vision ?: 'Menjadi mitra teknologi informasi yang mendukung transformasi digital melalui solusi yang relevan dan berorientasi pada kebutuhan pelanggan.';

    $missions = collect(preg_split('/\R+/', trim($company?->mission ?? '')))
        ->map('trim')->filter()->values();
    if ($missions->isEmpty()) {
        $missions = collect([
            'Mengembangkan website dan sistem informasi sesuai kebutuhan pengguna.',
            'Mendukung integrasi dan pengelolaan informasi agar lebih terstruktur.',
            'Memperhatikan kualitas, keamanan, dan kemudahan penggunaan.',
            'Membangun hubungan kerja profesional melalui komunikasi yang terarah.',
        ]);
    }
@endphp

{{-- HERO --}}
@include('website.partials.page-hero', [
    'badge' => 'PROFIL PERUSAHAAN',
    'title' => 'Mengenal ' . $name,
    'text'  => $company?->tagline ?: 'Mitra teknologi untuk mendukung kebutuhan digital, pengelolaan informasi, dan pengembangan sistem bisnis.',
])


{{-- TENTANG PERUSAHAAN (dari admin) --}}
<section class="py-5 bg-white">
    <div class="container py-lg-4">
        <div class="row align-items-start g-5">
            <div class="col-lg-5">
                <span class="small fw-bold text-uppercase"
                      style="color:#b07a00;letter-spacing:1.5px;">
                    Tentang Kami
                </span>

                <h2 class="fw-bold mt-2 mb-3" style="color:#123b66;">
                    Menghubungkan Kebutuhan dengan Solusi Digital
                </h2>

                @foreach($aboutParagraphs as $p)
                    <p class="text-secondary {{ $loop->last ? 'mb-0' : '' }}" style="line-height:1.9;">
                        {{ $p }}
                    </p>
                @endforeach
            </div>

            <div class="col-lg-7">
                <div class="rounded-4 p-4 p-lg-5" style="background:#f4f7fb;">
                    <div class="mb-4">
                        <div class="fw-bold mb-2" style="color:#123b66;">Fokus Perusahaan</div>
                        <p class="text-secondary mb-0" style="line-height:1.8;">
                            Membantu kebutuhan digitalisasi melalui solusi teknologi yang relevan
                            dengan proses dan tujuan bisnis pelanggan.
                        </p>
                    </div>

                    <div class="border-top pt-4 mb-4">
                        <div class="fw-bold mb-2" style="color:#123b66;">Pendekatan Kami</div>
                        <p class="text-secondary mb-0" style="line-height:1.8;">
                            Memahami kebutuhan terlebih dahulu, menentukan pendekatan yang sesuai,
                            dan memperhatikan kemudahan penggunaan serta pengelolaan sistem.
                        </p>
                    </div>

                    <div class="border-top pt-4">
                        <div class="fw-bold mb-2" style="color:#123b66;">Komitmen Layanan</div>
                        <p class="text-secondary mb-0" style="line-height:1.8;">
                            Mengutamakan komunikasi yang jelas, ruang lingkup pekerjaan yang terarah,
                            dan solusi yang sesuai dengan kebutuhan yang disepakati.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VISI DAN MISI (dari admin) --}}
<section class="py-5" style="background:#f7f9fc;">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <span class="small fw-bold text-uppercase"
                  style="color:#b07a00;letter-spacing:1.5px;">
                Arah Perusahaan
            </span>
            <h2 class="section-title mt-2 mb-2">Visi & Misi</h2>
            <p class="text-secondary">
                Prinsip yang menjadi landasan dalam pengembangan solusi teknologi.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-5">
                <div class="rounded-4 p-4 p-lg-5 h-100" style="background:#123b66;color:white;">
                    <div class="mb-3" style="font-size:2.5rem;color:#f4b942;">◎</div>
                    <h3 class="fw-bold mb-3">Visi</h3>
                    <p class="mb-0" style="line-height:1.9;color:#e0eaf5;">
                        {{ $vision }}
                    </p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="bg-white rounded-4 border p-4 p-lg-5 h-100">
                    <h3 class="fw-bold mb-4" style="color:#123b66;">Misi</h3>

                    @foreach($missions as $mission)
                        <div class="d-flex gap-3 {{ $loop->last ? '' : 'mb-4' }}">
                            <div class="fw-bold" style="color:#c38c18;">
                                {{ sprintf('%02d', $loop->iteration) }}
                            </div>
                            <p class="text-secondary mb-0" style="line-height:1.8;">
                                {{ $mission }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- NILAI PERUSAHAAN --}}
<section class="py-5 bg-white">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <h2 class="section-title mb-2">Nilai yang Kami Utamakan</h2>
            <p class="text-secondary">Prinsip dalam merancang dan memberikan solusi.</p>
        </div>

        <div class="row g-4">
            @foreach([
                ['Berorientasi pada Pelanggan', 'Memahami kebutuhan pelanggan sebagai dasar penentuan solusi.'],
                ['Terstruktur', 'Menjalankan pekerjaan dengan tujuan dan ruang lingkup yang jelas.'],
                ['Adaptif terhadap Teknologi', 'Mempertimbangkan perkembangan teknologi untuk menjawab kebutuhan yang terus berubah.'],
            ] as $value)
                <div class="col-md-4">
                    <div class="border rounded-4 p-4 h-100">
                        <h5 class="fw-bold" style="color:#123b66;">{{ $value[0] }}</h5>
                        <p class="text-secondary mb-0" style="line-height:1.8;">{{ $value[1] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5">
    <div class="container py-lg-3">
        <div class="rounded-4 p-4 p-lg-5 text-center" style="background:#123b66;color:white;">
            <h2 class="fw-bold mb-3">Mari Bangun Solusi Digital Bersama</h2>
            <p class="mx-auto mb-4" style="max-width:650px;color:#d8e3f0;line-height:1.8;">
                Sampaikan kebutuhan teknologi bisnis atau organisasi Anda
                untuk memulai diskusi bersama tim kami.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-lg"
               style="background:#f4b942;color:#123b66;font-weight:700;">
                Hubungi Kami →
            </a>
        </div>
    </div>
</section>

@endsection