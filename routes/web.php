<?php

use App\Models\User;
use Composer\InstalledVersions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/setup', function () {
    if (InstalledVersions::isInstalled('livewire/flux-pro')) {
        return redirect()->route('dashboard');
    }
    return view('setup');
})->name('setup');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Jetstream's default logout route uses a hidden form with CSRF token, submitted via JS as a POST request.
    // This alternative uses a user-specific signed route, losing no security while improving Flux compatibility.
    // You can explore how this works inside app.blade.php.
    //
    // The 'user' in the URL (if you haven't used signed routes before) might be confusing. If the route is signed,
    // and we have Auth::user(), why is that needed? This is to prevent a replay attack, because signed routes are
    // not tied to users. <iframe src="https://yoursite.com/logout?sig=1234567890"></iframe> would otherwise
    // work against any user, defeating the purpose. We obviously can't have a prankster or malicious site use
    // <iframe src="https://yoursite.com/logout/10"></iframe> either, thus the combination.
    //
    Route::get('/logout/{user}', function (User $user, Request $request) {
        if (! auth()->check() || $user->id !== Auth::id()) {
            abort(403);
        }
        Auth::guard('web')->logout();
        return redirect()->route('login');
    })->middleware('signed')->name('logout');

    Route::get('/test/confirms-password', function () {
        return redirect()->route('dashboard');
    })->middleware(['password.confirm']);
});
