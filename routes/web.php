<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });
Route::get('/statistic', function () { return view('statistic'); });
Route::get('/predict', function () { return view('predict'); });
Route::get('/blog', function () { 
    $response = Http::get('https://ckartisan.com/api/medium/feed/thungsong-th');
    $blogObject = $response->json();
    return view('blog',compact('blogObject')); 
});
Route::get('/contact', function () { return view('contact'); });

Route::get('livewire',function(){return view('livewire');});
