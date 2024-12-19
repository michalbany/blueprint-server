<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Hello World!',
    ]);
});

/**
 * Pozor při failu to přesměrovává na login z nějakého důvodu místo toho aby to vrátilo 403
 */
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
});


require __DIR__.'/auth.php';