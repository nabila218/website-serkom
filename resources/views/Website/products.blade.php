@extends('website.layout')

@section('title', 'Produk & Layanan | PT Solusi Koneksi Anda')

@section('content')

@include('website.partials.page-hero', [
    'badge' => 'PRODUK & LAYANAN',
    'title' => 'Solusi Digital untuk Kebutuhan Bisnis Anda',
    'text'  => 'Solusi teknologi informasi untuk mendukung pengelolaan informasi, pengembangan sistem, dan kebutuhan digital organisasi.',
])


{{-- DAFTAR PRODUK DAN LAYANAN --}}
<section class="py-5">
    <div class="container py-lg-4">
        <div class="mb-5">
            <span class="small fw-bold text-uppercase"
                  style="color:#b07a00;letter-spacing:1.5px;">
                Solusi Kami
            </span>

            <h2 class="section-title mt-2 mb-2">
                Jelajahi Produk & Layanan
            </h2>

            <p class="text-secondary mb-0" style="max-width:700px;">
                Temukan solusi yang dapat membantu meningkatkan efisiensi
                dan mendukung kebutuhan digital organisasi Anda.
            </p>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-md-6 col-lg-4">
                    <article class="ska-card h-100 bg-white overflow-hidden">
                        @if($product->image)
                            <img
                                src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($product->image) }}"
                                alt="{{ $product->name }}"
                                class="w-100"
                                style="height:230px;object-fit:cover;"
                                loading="lazy"
                            >
                        @else
                            <div class="d-flex align-items-center justify-content-center"
                                 style="height:180px;background:#edf4fc;color:#123b66;">
                                <span style="font-size:3rem;">◇</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <span class="small fw-semibold text-uppercase"
                                  style="color:#b07a00;">
                                {{ $product->category ?: 'Produk & Layanan' }}
                            </span>

                            <h4 class="fw-bold mt-2 mb-3"
                                style="color:#123b66;">
                                {{ $product->name }}
                            </h4>

                            <p class="text-secondary mb-0"
                               style="line-height:1.8;">
                                {{ $product->short_description ?: $product->description }}
                            </p>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="rounded-4 p-5 text-center"
                         style="background:#f4f7fb;">
                        <h4 class="fw-bold" style="color:#123b66;">
                            Informasi Layanan Segera Hadir
                        </h4>
                        <p class="text-secondary mb-0">
                            Informasi produk dan layanan sedang dipersiapkan.
                            Silakan hubungi kami untuk mendiskusikan kebutuhan Anda.
                        </p>
                    </div>
                </div>
                        @endforelse
                        </div>

                        <div class="mt-4 d-flex justify-content-center">
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </section>

{{-- ALUR KERJA --}}

{{-- ALUR KERJA --}}
<section class="py-5" style="background:#f7f9fc;">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <span class="small fw-bold text-uppercase"
                  style="color:#b07a00;letter-spacing:1.5px;">
                Cara Kami Bekerja
            </span>

            <h2 class="section-title mt-2 mb-2">
                Dari Kebutuhan Menjadi Solusi
            </h2>

            <p class="text-secondary">
                Pendekatan terstruktur untuk memahami dan menangani kebutuhan pelanggan.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="bg-white rounded-4 p-4 h-100 border">
                    <div class="fw-bold mb-3"
                         style="font-size:2rem;color:#d49b20;">01</div>
                    <h5 class="fw-bold" style="color:#123b66;">
                        Memahami Kebutuhan
                    </h5>
                    <p class="text-secondary mb-0" style="line-height:1.8;">
                        Mengidentifikasi kebutuhan, tantangan, dan tujuan
                        yang ingin dicapai pelanggan.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white rounded-4 p-4 h-100 border">
                    <div class="fw-bold mb-3"
                         style="font-size:2rem;color:#d49b20;">02</div>
                    <h5 class="fw-bold" style="color:#123b66;">
                        Merancang Solusi
                    </h5>
                    <p class="text-secondary mb-0" style="line-height:1.8;">
                        Menentukan pendekatan teknologi yang relevan
                        berdasarkan kebutuhan yang telah dipahami.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white rounded-4 p-4 h-100 border">
                    <div class="fw-bold mb-3"
                         style="font-size:2rem;color:#d49b20;">03</div>
                    <h5 class="fw-bold" style="color:#123b66;">
                        Mendukung Implementasi
                    </h5>
                    <p class="text-secondary mb-0" style="line-height:1.8;">
                        Mendukung penerapan solusi sesuai ruang lingkup
                        pekerjaan dan kesepakatan bersama.
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
                Diskusikan Kebutuhan Teknologi Anda
            </h2>

            <p class="mx-auto mb-4"
               style="max-width:650px;color:#d8e3f0;line-height:1.8;">
                Ceritakan kebutuhan bisnis atau organisasi Anda.
                Kami siap menerima pertanyaan dan mendiskusikan solusi yang relevan.
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