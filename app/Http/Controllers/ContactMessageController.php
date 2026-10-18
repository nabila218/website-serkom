<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'min:3', 'max:255'],
            'email'   => [
                'required',
                'email:rfc',
                'max:255',
                // domain wajib punya titik dan akhiran minimal 2 huruf (contoh: gmail.com)
                'regex:/^[^@\s]+@[^@\s]+\.[A-Za-z]{2,}$/',
            ],
            'subject' => ['required', 'string', 'min:3', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ], [
            'name.required'    => 'Nama wajib diisi.',
            'name.min'         => 'Nama minimal 3 karakter.',
            'email.required'   => 'Email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'email.regex'      => 'Format email tidak valid. Contoh: nama@gmail.com',
            'subject.required' => 'Subjek wajib diisi.',
            'subject.min'      => 'Subjek minimal 3 karakter.',
            'message.required' => 'Pesan wajib diisi.',
            'message.min'      => 'Pesan minimal 10 karakter.',
            'message.max'      => 'Pesan maksimal 5000 karakter.',
        ]);

        ContactMessage::create($data);

        return redirect()
            ->route('contact')
            ->with('success', 'Terima kasih, pesan Anda sudah terkirim. Kami akan segera menanggapinya.');
    }
}