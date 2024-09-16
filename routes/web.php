<?php
use App\Http\Controllers\AboutController As frontendAboutController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;



// use Session;

Route::get('/',[ HomeController::class, 'index'])->name('home');
Route::get('/about', [frontendAboutController::class, 'index'])->name('about');

Route::get('/posts/{slug}',[HomeController::class, 'show'])->name('home.show');

Route::get('/posts', function () {
    return view('frontend.post.index');
})->name('front_post');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send_mail'])->name('contact.send');

Route::middleware('Localization')->group(function(){
    // Route for localization of Dari and English Language
Route::get('/locale/{locale}',function($locale){
    app()->setlocale($locale);
    // if (!in_array($locale, ['en', 'dr'])) {
    //     abort(400);
    // }
    Session::put('locale',$locale);
    // return __('nav.home'); // /locale/en or /locale/dr
    // put the selected language in session for user, which automatically be selected everytime he logs in, and to this we have made a middleware as well like localization
    /** we made a localization middleware so if the user selects his language and session saves his language, in future when he come to
     * website that middleware will change the language according to his session
     * also we should add new middleware kernel.php but in laravel 11 it refactored and instead of that we add middleware to
     * app/bootstrap/app.php
     * */  
    // 

    return redirect()->back();

})->name('locale');

Route::get('/',[ HomeController::class, 'index'])->name('home');
Route::get('/about', [frontendAboutController::class, 'index'])->name('about');

Route::get('/posts/{slug}',[HomeController::class, 'show'])->name('home.show');

Route::get('/posts', function () {
    return view('frontend.post.index');
})->name('front_post');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send_mail'])->name('contact.send');
});

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
        Route::post('admin/about/update',[AboutController::class, 'store'])->name('admin.about.store') ;
        Route::get('settings',[SettingController::class, 'index'])->name('settings.index');
        Route::post('settings',[SettingController::class, 'store'])->name('settings.store');
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
