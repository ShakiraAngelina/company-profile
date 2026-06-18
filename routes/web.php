<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\InsightsController;
use App\Http\Controllers\CareersController;
use App\Models\Notification;

// Halaman utama
Route::get('/', function () { return view('index'); });

// Contact Us
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);

// Admin auth & dashboard routes
Route::get('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/login', [AdminAuthController::class, 'doLogin']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard']);
Route::get('/admin/projects', [AdminAuthController::class, 'projects']);
Route::get('/admin/news', [AdminAuthController::class, 'news']);
Route::get('/admin/publications', [AdminAuthController::class, 'publications']);
Route::get('/admin/careers', [AdminAuthController::class, 'careers']);
Route::get('/admin/messages', [AdminAuthController::class, 'messages']);

// Notifications
Route::get('/admin/notifications', function(){
    if (!session('is_admin')) { return redirect('/admin/login'); }
    return response()->json(
        Notification::orderByDesc('created_at')->limit(50)->get()
    );
});
Route::post('/admin/notifications/read-all', [AdminController::class, 'readAllNotifications']);
Route::get('/admin/notifications/open/{id}', [AdminController::class, 'openNotification']);

// Admin storage handlers
Route::post('/admin/news', [AdminController::class, 'storeNews']);
Route::post('/admin/news/{id}/update', [AdminController::class, 'updateNews']);
Route::post('/admin/project', [AdminController::class, 'storeProject']);
Route::post('/admin/project/{id}/update', [AdminController::class, 'updateProject']);
Route::post('/admin/publication', [AdminController::class, 'storePublication']);
Route::post('/admin/career', [AdminController::class, 'storeCareer']);
Route::post('/admin/career/{id}/update', [AdminController::class, 'updateCareer']);

// Alias ke file HTML lama
Route::get('/index.html', function () {
    return view('index');
});

// Clients
Route::get('/clients', function () {
    return view('clients');
});

Route::get('/clients.html', function () {
    return view('clients');
});

// About subpages
Route::view('/about', 'about');
Route::view('/about.html', 'about');
Route::view('/history', 'history');
Route::view('/history.html', 'history');
Route::view('/leadership', 'leadership');
Route::view('/leadership.html', 'leadership');
Route::view('/purpose', 'purpose');
Route::view('/purpose.html', 'purpose');
Route::view('/management', 'management');
Route::view('/management.html', 'management');

// Expertise subpages now redirect to anchors on Expertise landing
Route::redirect('/environment', '/expertise#environmental');
Route::redirect('/environment.html', '/expertise#environmental');
Route::redirect('/infrastructure', '/expertise#infrastructure');
Route::redirect('/infrastructure.html', '/expertise#infrastructure');
Route::redirect('/community', '/expertise#community');
Route::redirect('/community.html', '/expertise#community');
Route::redirect('/electrical', '/expertise#electrical');
Route::redirect('/electrical.html', '/expertise#electrical');

// Expertise landing
Route::view('/expertise', 'expertise');
Route::view('/expertise.html', 'expertise');

// Insights subpages now redirect to anchors on Insights landing
Route::redirect('/projects', '/insights#projects');
Route::redirect('/projects.html', '/insights#projects');
Route::redirect('/news', '/insights#news');
Route::redirect('/news.html', '/insights#news');
Route::redirect('/publications', '/insights#publications');
Route::redirect('/publications.html', '/insights#publications');

// Insights landing (dynamic)
Route::get('/insights', [InsightsController::class, 'index']);
Route::get('/insights.html', [InsightsController::class, 'index']);

// Careers dynamic page
Route::get('/careers', [CareersController::class, 'index']);
Route::post('/careers/apply', [CareersController::class, 'apply']);
