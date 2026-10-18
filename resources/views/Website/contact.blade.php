@extends('website.layout')

@section('title', 'Kontak | ' . ($company?->company_name ?: 'PT Solusi Koneksi Anda'))

@section('content')

@include('website.partials.page-hero', [
    'badge' => 'KONTAK',
    'title' => 'Mari Terhubung dengan Kami',
    'text'  => 'Punya pertanyaan atau kebutuhan solusi teknologi untuk bisnis Anda? Sampaikan melalui formulir di bawah ini.',
])

{{-- ISI KONTAK --}}
<section class="py-5">
    <div class="container py-3">
        <div class="row g-4 align-items-stretch">

            {{-- INFORMASI KONTAK (dari admin) --}}
            <div class="col-lg-5">
                <div class="h-100 rounded-4 p-4 p-md-5 text-white" style="background: #123b66;">

                    <span class="small fw-semibold text-uppercase"
                          style="color: #f4b942; letter-spacing: 2px;">
                        Informasi Kontak
                    </span>

                    <h2 class="fw-bold mt-3 mb-3">Kami Siap Mendengarkan Anda</h2>

                    <p class="mb-4" style="color: #d8e4f0; line-height: 1.8;">
                        Hubungi kami untuk mendiskusikan kebutuhan, pertanyaan,
                        maupun peluang kerja sama di bidang teknologi dan layanan digital.
                    </p>

                    {{-- Alamat --}}
                    <div class="d-flex gap-3 mb-4">
                        <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width: 46px; height: 46px; background: rgba(255,255,255,.12); color: #f4b942;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Alamat</h6>
                            <p class="mb-0 small" style="color: #d8e4f0; line-height: 1.7;">
                                {{ $company?->address ?: 'Informasi alamat belum tersedia.' }}
                            </p>
                        </div>
                    </div>

                    {{-- Telepon --}}
                    <div class="d-flex gap-3 mb-4">
                        <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width: 46px; height: 46px; background: rgba(255,255,255,.12); color: #f4b942;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Telepon</h6>
                            <p class="mb-0 small" style="color: #d8e4f0;">
                                @if($company?->phone)
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $company->phone) }}"
                                       class="text-white text-decoration-none">
                                        {{ $company->phone }}
                                    </a>
                                @else
                                    Informasi telepon belum tersedia.
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="d-flex gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width: 46px; height: 46px; background: rgba(255,255,255,.12); color: #f4b942;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p class="mb-0 small" style="color: #d8e4f0; overflow-wrap: anywhere;">
                                @if($company?->email)
                                    <a href="mailto:{{ $company->email }}"
                                       class="text-white text-decoration-none">
                                        {{ $company->email }}
                                    </a>
                                @else
                                    Informasi email belum tersedia.
                                @endif
                            </p>
                        </div>
                    </div>

                    <hr class="my-4" style="border-color: rgba(255,255,255,.2);">

                    <p class="small mb-0" style="color: #d8e4f0;">
                        <span style="color: #f4b942;" aria-hidden="true">●</span>
                        Kami terbuka untuk pertanyaan dan diskusi lebih lanjut.
                    </p>
                </div>
            </div>

            {{-- FORMULIR --}}
            <div class="col-lg-7">
                <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 h-100">

                    <span class="small fw-semibold text-uppercase"
                          style="color: #1c5688; letter-spacing: 1.5px;">
                        Kirim Pesan
                    </span>

                    <h2 class="fw-bold mt-2 mb-2" style="color: #123b66;">
                        Ceritakan Kebutuhan Anda
                    </h2>

                    <p class="text-secondary mb-4">
                        Isi formulir di bawah ini. Pastikan informasi yang Anda masukkan sudah benar.
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success rounded-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3" role="alert">
                            <strong>Pesan belum dapat dikirim.</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" id="name" name="name"
                                       class="form-control rounded-3 py-2 @error('name') is-invalid @enderror"
                                       placeholder="Masukkan nama Anda"
                                       value="{{ old('name') }}" maxlength="255" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Alamat Email</label>
                                <input type="email" id="email" name="email"
                                       class="form-control rounded-3 py-2 @error('email') is-invalid @enderror"
                                       placeholder="nama@email.com"
                                       value="{{ old('email') }}" maxlength="255" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="subject" class="form-label fw-semibold">Subjek</label>
                                <input type="text" id="subject" name="subject"
                                       class="form-control rounded-3 py-2 @error('subject') is-invalid @enderror"
                                       placeholder="Apa yang ingin Anda diskusikan?"
                                       value="{{ old('subject') }}" maxlength="255" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold">Pesan</label>
                                <textarea id="message" name="message" rows="5" maxlength="5000"
                                          class="form-control rounded-3 @error('message') is-invalid @enderror"
                                          placeholder="Tuliskan pertanyaan atau kebutuhan Anda di sini..."
                                          required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit"
                                        class="btn rounded-3 px-4 py-3 fw-semibold text-dark w-100"
                                        style="background: #f4b942; border: none;">
                                    Kirim Pesan <span class="ms-2" aria-hidden="true">→</span>
                                </button>
                            </div>
                        </div>
                    </form>

                    <p class="text-secondary small mt-3 mb-0">
                        Data formulir digunakan untuk membantu kami menanggapi pesan Anda.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection