<?php
use App\Http\Controllers\AboutController As frontendAboutController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/',[ HomeController::class, 'index'])->name('home');
Route::get('/about', [frontendAboutController::class, 'index'])->name('about');

Route::get('/posts/{slug}',[HomeController::class, 'show'])->name('home.show');

Route::get('/posts', function () {
    return view('frontend.post.index');
})->name('front_post');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send_mail'])->name('contact.send');



// Route::get('/dashboard', function () {
//     return view('backend.dashboard.index');
//     // This middleware means if anyone wants to access dashboard he should be verified
// })->middleware(['auth', 'verified'])->name('dashboard');


// but if we want to have authentication for different pages, we can make a middleware group for them
Route::middleware('auth')->group(
    function(){
        Route::get('/dashboard',function(){
            return view('backend.dashboard.index');
        })->name('dashboard');

        Route::resource('post', PostController::class);
        Route::get('trash', [PostController::class,'trash'])->name('post.trash'); //route for trash button
        Route::delete('force-delete/{id}',[PostController::class, 'delete'])->name('post.force-delete');
        Route::get('restore/{id}',[PostController::class, 'restore'])->name('post.restore');
        Route::get('admin/about',[AboutController::class, 'index'])->name('admin.about');
        Route::post('admin/about/update',[AboutController::class, 'store'])->name('admin.about.store');
    }

);

// link of laravel file manager

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
