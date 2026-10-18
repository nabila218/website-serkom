@extends('website.layout')

@section('title', $article->title . ' | ' . ($company?->company_name ?: 'PT Solusi Koneksi Anda'))

@section('content')

{{-- HERO --}}
@include('website.partials.page-hero', [
    'badge' => $article->category ?: 'ARTIKEL',
    'title' => $article->title,
    'text'  => 'Diterbitkan ' . ($article->published_at ?? $article->created_at)->format('d/m/Y'),
])

{{-- ISI ARTIKEL --}}
<section class="py-5 bg-white">
    <div class="container" style="max-width:820px;">
        <a href="{{ route('articles') }}"
           class="text-decoration-none small fw-semibold d-inline-block mb-4"
           style="color:#123b66;">
            ← Kembali ke artikel
        </a>

        @if($article->image)
            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($article->image) }}"
                 alt="{{ $article->title }}"
                 class="img-fluid rounded-4 w-100 mb-4"
                 style="max-height:420px;object-fit:cover;">
        @endif

        @if($article->excerpt)
            <p class="fs-5 fw-semibold" style="color:#123b66;line-height:1.8;">
                {{ $article->excerpt }}
            </p>
        @endif

        <div class="text-secondary" style="line-height:2;">
            {!! nl2br(e($article->content)) !!}
        </div>
    </div>
</section>

{{-- ARTIKEL LAINNYA --}}
@if($related->isNotEmpty())
<section class="py-5" style="background:#f7f9fc;">
    <div class="container py-lg-3">
        <div class="mb-4">
            <span class="small fw-bold text-uppercase"
                  style="color:#b07a00;letter-spacing:1.5px;">
                Bacaan Lainnya
            </span>
            <h2 class="section-title mt-2 mb-0">Artikel Lainnya</h2>
        </div>

        <div class="row g-4">
            @foreach($related as $item)
                <div class="col-md-6 col-lg-4">
                    <article class="ska-card bg-white h-100 overflow-hidden">
                        @if($item->image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}"
                                 alt="{{ $item->title }}" loading="lazy">
                        @endif

                        <div class="p-4">
                            @if($item->category)
                                <span class="badge rounded-pill mb-2"
                                      style="background:#edf4fc;color:#123b66;">
                                    {{ $item->category }}
                                </span>
                            @endif

                            <h5 class="fw-bold mb-2">
                                <a href="{{ route('articles.show', $item->slug) }}"
                                   class="text-decoration-none" style="color:#123b66;">
                                    {{ $item->title }}
                                </a>
                            </h5>

                            <a href="{{ route('articles.show', $item->slug) }}"
                               class="text-decoration-none fw-semibold small" style="color:#123b66;">
                                Baca selengkapnya →
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- AJAKAN --}}
<section class="py-5">
    <div class="container py-lg-3">
        <div class="rounded-4 p-4 p-lg-5 text-center" style="background:#123b66;color:white;">
            <h2 class="fw-bold mb-3">Butuh Solusi Teknologi untuk Bisnis Anda?</h2>
            <p class="mx-auto mb-4" style="max-width:650px;color:#d8e3f0;line-height:1.8;">
                Hubungi kami untuk mendiskusikan kebutuhan website, sistem informasi,
                atau solusi digital lainnya.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-lg"
               style="background:#f4b942;color:#123b66;font-weight:700;">
                Hubungi Kami →
            </a>
        </div>
    </div>
</section>

@endsection