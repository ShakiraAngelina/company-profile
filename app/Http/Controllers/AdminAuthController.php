<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','string'],
        ]);

        // Ambil kredensial dari config/access.php (berbasis ENV)
        $adminEmail = config('access.admin_email');
        $adminPassword = config('access.admin_password');

        if ($credentials['email'] === $adminEmail && $credentials['password'] === $adminPassword) {
            $request->session()->put('is_admin', true);
            return redirect(config('access.admin_dashboard_url'));
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');
        return redirect(config('access.admin_login_url'));
    }

    private function ensureAuth()
    {
        if (!session('is_admin')) {
            return redirect('/admin/login');
        }
        return null;
    }

    public function dashboard()
    {
        if ($redirect = $this->ensureAuth()) return $redirect;
        $stats = [
            'projects' => \App\Models\Project::count(),
            'news' => \App\Models\News::count(),
            'publications' => \App\Models\Publication::count(),
            'messages' => \App\Models\Message::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function projects()
    {
        if ($redirect = $this->ensureAuth()) return $redirect;
        return view('admin.projects');
    }

    public function news()
    {
        if ($redirect = $this->ensureAuth()) return $redirect;
        return view('admin.news');
    }

    public function publications()
    {
        if ($redirect = $this->ensureAuth()) return $redirect;
        return view('admin.publications');
    }

    public function careers()
    {
        if ($redirect = $this->ensureAuth()) return $redirect;
        return view('admin.careers');
    }

    public function messages()
    {
        if ($redirect = $this->ensureAuth()) return $redirect;
        return view('admin.messages');
    }
}