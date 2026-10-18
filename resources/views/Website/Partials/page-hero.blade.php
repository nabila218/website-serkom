@php
    $heroFile = collect(['jpg', 'jpeg', 'png', 'webp'])
        ->map(fn ($e) => 'images/hero.' . $e)
        ->first(fn ($p) => file_exists(public_path($p)));
@endphp

<section class="page-hero {{ $heroFile ? 'has-photo' : '' }}"
         @if($heroFile) style="background-image:url('{{ asset($heroFile) }}')" @endif>
    <div class="container">
        <span class="badge rounded-pill mb-3 px-3 py-2"
              style="background:#fff0c2;color:#805600;">
            {{ $badge }}
        </span>

        <h1 class="display-5 fw-bold mb-3 mx-auto" style="max-width:820px;">
            {{ $title }}
        </h1>

        @isset($text)
            <p class="mx-auto mb-0" style="max-width:640px;line-height:1.8;">
                {{ $text }}
            </p>
        @endisset
    </div>
</section>