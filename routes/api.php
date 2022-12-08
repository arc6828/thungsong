<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// สถานีทุ่งสง 795 https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id=795&start_date=2022-12-05&end_date=2022-12-08%2017:35
// สถานีบ้านประดู่ 1101568 https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id=1101568&start_date=2022-12-05&end_date=2022-12-08%2017:30


// สถานีทุ่งสง 795 https://api-v3.thaiwater.net/api/v1/thaiwater30/public/rain_24h_graph?station_id=795
// สถานีฝายคลองท่าเลา 13892 https://api-v3.thaiwater.net/api/v1/thaiwater30/public/rain_24h_graph?station_id=13892


Route::get("waterlevel/now",function(){
    //station_id 795 ทุ่งสง
    $current = date('Y-m-d H:i:s');
    $past = date('Y-m-d H:i:s', strtotime('-4 hour'));
    $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id=795&start_date={$past}&end_date={$current}";
    $response = Http::get($url);
    return $response->json();
});
Route::get("waterlevel/now/station/{station_id}",function($station_id){
    //station_id 795 สถานีทุ่งสง
    //station_id 1101568 สถานีบ้านประดู่
    $current = date('Y-m-d H:i:s');
    $past = date('Y-m-d H:i:s', strtotime('-4 hour'));
    $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id={$station_id}&start_date={$past}&end_date={$current}";
    $response = Http::get($url);
    return $response->json();
});
Route::get("rain/now/station/{station_id}",function($station_id){
    //station_id 795 ทุ่งสง
    //station_id 13892 สถานีฝายคลองท่าเลา
    $current = date('Y-m-d H:i:s');
    $past = date('Y-m-d H:i:s', strtotime('-4 hour'));
    $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/rain_24h_graph?station_id={$station_id}";
    $response = Http::get($url);
    return $response->json();
});

Route::get("waterlevel/predict",function(){
    $url = "https://ckartisanspace.sgp1.digitaloceanspaces.com/thungsong/predict/floodwaterlevel.json";
    $response = Http::get($url);
    return $response->json();
});