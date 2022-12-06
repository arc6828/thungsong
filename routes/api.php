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

Route::get("waterlevel/now",function(){
    $current = date('Y-m-d H:i:s');
    $past = date('Y-m-d H:i:s', strtotime('-4 hour'));
    $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id=795&start_date={$past}&end_date={$current}";
    $response = Http::get($url);
    return $response->json();
});
Route::get("waterlevel/predict",function(){
    $url = "https://ckartisanspace.sgp1.digitaloceanspaces.com/thungsong/predict/floodwaterlevel.json";
    $response = Http::get($url);
    return $response->json();
});