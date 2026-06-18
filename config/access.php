<?php

return [
    // Public site base URL (optional; fallback to local dev URL)
    'site_url' => env('SITE_URL', 'http://127.0.0.1:8000'),

    // Admin base path (prefix). Rute saat ini menggunakan '/admin' secara statis,
    // namun nilai ini tetap disediakan untuk konsistensi dokumentasi.
    'admin_base_path' => env('ADMIN_BASE_PATH', 'admin'),

    // Full Admin URL (computed): SITE_URL + '/' + ADMIN_BASE_PATH
    // Full Admin URL with trailing slash (e.g., http://127.0.0.1:8000/admin/)
    'admin_url' => rtrim(env('SITE_URL', 'http://127.0.0.1:8000'), '/') . '/' . trim(env('ADMIN_BASE_PATH', 'admin'), '/') . '/',
    

    // Admin URLs (login/dashboard)
    'admin_login_url' => env('ADMIN_LOGIN_URL', '/admin/login'),
    'admin_dashboard_url' => env('ADMIN_DASHBOARD_URL', '/admin/dashboard'),

    // Credentials untuk simple admin auth (sementara, sebaiknya pakai tabel users di masa depan)
    'admin_email' => env('ADMIN_EMAIL', 'admin@arkonin.com'),
    'admin_password' => env('ADMIN_PASSWORD', 'admin'),
];