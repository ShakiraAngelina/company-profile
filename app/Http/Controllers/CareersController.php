<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\Application;

class CareersController extends Controller
{
    public function index()
    {
        $careers = Career::where('status','open')->orderByDesc('created_at')->get();
        return view('careers', compact('careers'));
    }

    public function apply(Request $request)
    {
        $data = $request->validate([
            'career_id' => ['required','exists:careers,id'],
            'name' => ['required','string','max:100'],
            'email' => ['required','email','max:100'],
            'phone' => ['nullable','string','max:50'],
            'cv_file' => ['nullable','file','mimes:pdf,doc,docx','max:5120'],
            'message' => ['nullable','string'],
        ]);

        if ($request->hasFile('cv_file')) {
            $path = $request->file('cv_file')->store('applications/cv','public');
            $data['cv_file'] = $path;
        }
        try {
            Application::create($data);
            return back()->with('success','Lamaran berhasil dikirim. Kami akan menghubungi Anda melalui email jika terpilih.');
        } catch (\Throwable $e) {
            return back()->with('error','Lamaran gagal dikirim. Silakan coba lagi nanti.')->withInput();
        }
    }
}