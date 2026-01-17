<?php
// PhpStorm Meta file for Laravel IDE support
namespace PHPSTORM_META {

    // Laravel facades
    \override(\Illuminate\Support\Facades\DB::class, type(0));
    \override(\Illuminate\Support\Facades\Cache::class, type(0));
    \override(\Illuminate\Support\Facades\File::class, type(0));
    \override(\Illuminate\Support\Facades\Storage::class, type(0));
    \override(\Illuminate\Support\Facades\Route::class, type(0));
    \override(\Illuminate\Support\Facades\Auth::class, type(0));
    \override(\Illuminate\Support\Facades\Log::class, type(0));
    \override(\Illuminate\Support\Facades\Mail::class, type(0));
    \override(\Illuminate\Support\Facades\Session::class, type(0));
    \override(\Illuminate\Support\Facades\Validator::class, type(0));

    // Helper functions
    expectedArguments(\auth(), 0, 'web', 'api');
    expectedArguments(\config(), 0, 'app', 'database', 'cache', 'session', 'mail', 'auth', 'filesystems');

    // Model static methods
    \override(\Illuminate\Database\Eloquent\Builder::class, type(0));
}
