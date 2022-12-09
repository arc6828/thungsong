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

require __DIR__ . '/auth.php';


Route::get('/', function () {
    //IMAGES
    $images = [
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_1.jpg',
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_38.jpg',
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_65.jpg',
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_78.jpg',
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_147.jpg',
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_137.jpg',
    ];
    //BLOG
    $response = Http::get('https://ckartisan.com/api/medium/feed/thungsong-th');
    $blogObject = $response->json();
    return view('home', compact('blogObject','images'));
});
Route::get('/about', function () {
    //IMAGES
    $images = [
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_1.jpg',
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_38.jpg',
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_65.jpg',
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_78.jpg',
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_147.jpg',
        'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_137.jpg',
    ];
    $profiles = [
        (object)[ "image" => "sitang.jpg" , "name" => "ผศ.ดร.สิตางศุ์ พิลัยหล้า" , "position" => "Project Manager" , "organization" => "ภาควิชาวิศวกรรมทรัพยากรน้ำ คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเกษตรศาสตร์"  ],
        (object)[ "image" => "jirayu.jpg" , "name" => "นายจิรายุ พึ่งฉิ่ง" , "position" => "Machine Learning Developer" , "organization" => "ภาควิชาวิศวกรรมทรัพยากรน้ำ คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเกษตรศาสตร์"  ],
        (object)[ "image" => "chavalit.jpg" , "name" => "นายชวลิต โควีระวงศ์" , "position" => "Software Engineer" , "organization" => "หลักสูตรวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์"  ],
    ];
    return view('about',compact('profiles','images'));
});
Route::get('/statistic', function () {
    return view('statistic');
});
Route::get('/predict', function () {
    return view('predict');
});
Route::get('/blog', function () {
    $response = Http::get('https://ckartisan.com/api/medium/feed/thungsong-th');
    $blogObject = $response->json();
    return view('blog', compact('blogObject'));
});

Route::get('/gallery', function () {
    $images = ['LINE_ALBUM_Nakhon Sri _day 1_160222_220914_1.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_105.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_119.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_12.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_137.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_146.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_147.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_149.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_158.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_162.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_166.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_29.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_30.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_38.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_46.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_65.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_78.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_8.jpg', 'LINE_ALBUM_Nakhon Sri _day 1_160222_220914_85.jpg', 'LINE_ALBUM_Nakhon Sri_day_2 170222_221202_17.jpg', 'LINE_ALBUM_Nakhon Sri_day_2 170222_221202_36.jpg', 'LINE_ALBUM_Nakhon Sri_day_2 170222_221202_42.jpg', 'LINE_ALBUM_Nakhon Sri_day_2 170222_221202_64.jpg', 'LINE_ALBUM_Nakhon Sri_day_2 170222_221202_8.jpg', 'LINE_ALBUM_Nakhon Sri_day_2 170222_221202_9.jpg'];
    return view('gallery', compact('images'));
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/chart', function () {
    return view('chart');
});

Route::get('livewire', function () {
    return view('livewire');
});
