<?php

use App\Models\ExportFile;
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


Route::get("waterlevel/now", function () {
    //station_id 795 ทุ่งสง
    $current = date('Y-m-d H:i:s');
    $past = date('Y-m-d H:i:s', strtotime('-4 hour'));
    // $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id=795&start_date={$past}&end_date={$current}";
    $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id=795";
    $response = Http::get($url);
    return $response->json();
});
Route::get("waterlevel/station/{station_id}", function ($station_id) {
    //station_id 795 สถานีทุ่งสง
    //station_id 1101568 สถานีบ้านประดู่
    //station_id 13892 สถานีฝายคลองท่าเลา
    $current = date('Y-m-d H:i:s');
    $past = date('Y-m-d H:i:s', strtotime('-24 hour'));
    $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id={$station_id}&start_date={$past}&end_date={$current}";
    // $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id={$station_id}";
    $response = Http::get($url);
    return $response->json();
});
Route::get("rain/station/{station_id}", function ($station_id) {
    //station_id 795 ทุ่งสง
    //station_id 13892 สถานีฝายคลองท่าเลา
    $current = date('Y-m-d H:i:s');
    $past = date('Y-m-d H:i:s', strtotime('-24 hour'));
    $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/rain_24h_graph?station_id={$station_id}";
    $response = Http::get($url);
    return $response->json();
});
// MAKE CSV
Route::get("waterlevel/station/{station_id}/csv", function (Request $request, $station_id) {
    $current = date('Y-m-d H:i:s');
    $past = date('Y-m-d H:i:s', strtotime('-24 hour'));
    $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id={$station_id}&start_date={$past}&end_date={$current}";
    // $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id={$station_id}";
    $response = Http::get($url);
    $json = $response->json();
    $json_data = $json["data"]["graph_data"];
    $body = array_map(function ($item) {
        return [$item["datetime"], $item["value"], $item["value_out"], $item["discharge"],];
    }, $json_data);
    $head = ["datetime", "value", "value_out", "discharge"];
    return ExportFile::toCSV($request, "wl-{$station_id}.csv", $body, $head);
    // return 
});
Route::get("rain/station/{station_id}/csv", function (Request $request,$station_id) {
    //station_id 795 ทุ่งสง
    //station_id 13892 สถานีฝายคลองท่าเลา
    $current = date('Y-m-d H:i:s');
    $past = date('Y-m-d H:i:s', strtotime('-24 hour'));
    $url = "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/rain_24h_graph?station_id={$station_id}";
    $response = Http::get($url);
    $json = $response->json();
    $json_data = $json["data"];
    $body = array_map(function ($item) {
        return [$item["rainfall_datetime"], $item["rainfall_value"]];
    }, $json_data);
    $head = ["rainfall_datetime", "rainfall_value"];
    return ExportFile::toCSV($request, "rain-{$station_id}.csv", $body, $head);
});

Route::get("waterlevel/predict", function () {
    $url = "https://ckartisanspace.sgp1.digitaloceanspaces.com/thungsong/predict/floodwaterlevel.json";
    $response = Http::get($url);
    return $response->json();
});

Route::get("now/{name}", function ($name) {
    $url = "https://ckartisanspace.sgp1.digitaloceanspaces.com/thungsong/now/now-{$name}.json";
    $response = Http::get($url);
    return $response->json();
});

Route::get("statistic/now", function () {
    $wl_urls = [
        "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id=795",
        "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/waterlevel_graph?station_type=tele_waterlevel&station_id=1101568",
    ];
    $rain_urls = [
        "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/rain_24h_graph?station_id=795",
        "https://api-v3.thaiwater.net/api/v1/thaiwater30/public/rain_24h_graph?station_id=13892",
    ];

    $wl_data = array_map(function ($item) {
        $response = Http::get($item);
        $d = $response->json()["data"]["graph_data"];
        $collection = collect($d);
        $first = $collection->first(function ($item) {
            return $item["value"] != null;
        });
        $last = $collection->last(function ($item) {
            return $item["value"] != null;
        });
        $d = 0;
        try {
            $d = $last["rainfall_value"] - $first["rainfall_value"];
        } catch (Exception $e) {
        }
        return [
            "oldest" => $first,
            "avg" => $collection->avg('value'),
            "min" => $collection->min('value'),
            "max" => $collection->max('value'),
            "latest" => $last,
            "d" => $d,
        ];
    }, $wl_urls);


    $rain_data = array_map(function ($item) {
        $response = Http::get($item);
        $d = $response->json()["data"];
        $collection = collect($d);
        $first = $collection->first(function ($item) {
            return $item["rainfall_value"] != null;
        });
        $last = $collection->last(function ($item) {
            return $item["rainfall_value"] != null;
        });
        $d = 0;
        try {
            $d = $last["rainfall_value"] - $first["rainfall_value"];
        } catch (Exception $e) {
        }
        return [
            "oldest" => $first,
            "avg" => $collection->avg('rainfall_value'),
            "min" => $collection->min('rainfall_value'),
            "max" => $collection->max('rainfall_value'),
            "latest" => $last,
            "d" => $d,
        ];
    }, $rain_urls);

    $data = [
        "wl_thungsong" => $wl_data[0],
        "wl_baanpradoo" => $wl_data[1],
        "rain_thungsong" => $rain_data[0],
        "rain_faiklongtalao" => $rain_data[1],
    ];

    return $data;
});
