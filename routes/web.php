<?php


use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\RecordlabelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('/artists/{artist}/edit', [ArtistController::class, 'edit'])->name('artists.edit');
Route::put('/artists/{artist}', [ArtistController::class, 'update'])->name('artists.update');
Route::delete('/artists/{artist}', [ArtistController::class, 'destroy'])->name('artists.destroy');
Route::resource('artists', ArtistController::class);                              // one to many relationship artist -> songs
Route::resource('songs', SongController::class)->except(['index', 'show']);
Route::resource('recordlabels', RecordlabelController::class);
Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');




require __DIR__.'/auth.php';
