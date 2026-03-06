<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    $isAdmin = false;
    if ($user) {
        $fieldAdmin = ($user->role ?? null) === 'admin';
        $methodAdmin = method_exists($user, 'isAdmin') ? (bool) $user->isAdmin() : false;

        $isAdmin = $fieldAdmin || $methodAdmin;
    }

    $stats = [
        'categories' => null,
        'products' => null,
        'users' => null,
    ];

    if ($isAdmin) {
        try {
            $stats = [
                'categories' => \App\Models\Category::count(),
                'products' => \App\Models\Product::count(),
                'users' => \App\Models\User::count(),
            ];
        } catch (\Throwable $e) {
            report($e);
            $stats = [
                'categories' => 0,
                'products' => 0,
                'users' => 0,
            ];
        }
    }

    return view('dashboard', [
        'isAdmin' => $isAdmin,
        'stats' => $stats,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/properties', 'admin.properties')->name('properties');
    Route::view('/customers', 'admin.customers')->name('customers');
    Route::view('/sales-marketing', 'admin.sales-marketing')->name('sales-marketing');
    Route::view('/plans-performance', 'admin.plans-performance')->name('plans-performance');

    Route::get('/categories', function () {
        return view('admin.categories', [
            'categories' => \App\Models\Category::orderBy('name')->paginate(10),
        ]);
    })->name('categories');

    Route::get('/products', function () {
        return view('admin.products', [
            'products' => \App\Models\Product::with('category')->orderByDesc('created_at')->paginate(10),
        ]);
    })->name('products');

    Route::get('/users', function () {
        return view('admin.users', [
            'users' => \App\Models\User::orderBy('created_at')->paginate(10),
        ]);
    })->name('users');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
