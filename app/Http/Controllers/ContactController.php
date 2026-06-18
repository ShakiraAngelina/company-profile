<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:100'],
            'email' => ['required','email','max:100'],
            'subject' => ['required','string','max:150'],
            'message' => ['required','string','max:5000'],
        ]);

        try {
            Message::create($data);
            return redirect('/contact')
                ->with('success', 'Pesan Anda berhasil dikirim. Mohon tunggu balasan via email dari admin.');
        } catch (\Throwable $e) {
            return back()
                ->with('error', 'Pesan gagal dikirim. Silakan coba lagi nanti atau hubungi kami lewat email.')
                ->withInput();
        }
    }
}