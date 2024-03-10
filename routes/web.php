<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = User::where('id', Auth::id());
    return view('dashboard', compact('user'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/create', [OrderController::class, 'create']);
Route::post('/order', [OrderController::class, 'store']);
Route::get('/order/edit/{id}', [OrderController::class, 'edit']);
Route::patch('/order/update/{id}', [OrderController::class, 'update']);
Route::delete('/order/delete/{id}', [OrderController::class, 'destroy']);

Route::get('/payment', [PaymentController::class, 'index']);
Route::get('payment/pay/{id}', [PaymentController::class, 'create']);
Route::post("/payment", [PaymentController::class, 'store']);
Route::get("/payment/report", [PaymentController::class, 'report']);
