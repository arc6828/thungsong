<?php
// สถานีระดับน้ำ
$b["body"]["contents"][0]["text"] = "{$item["station"]["tele_station_name"]["th"]} ({{$item["station"]["id"]}})";

// location,
$b["body"]["contents"][0]["text"] = "ต.{$item["geocode"]["tumbon_name"]["th"]} อ.{$item["geocode"]["amphoe_name"]["th"]} จ.{$item["geocode"]["province_name"]["th"]}";

// ------------------------------

// date "waterlevel_datetime": "2023-08-05 19:30",
$b["body"]["contents"][0]["text"] = $item["waterlevel_datetime"];

// ปริมาณน้ำ "storage_percent": "70.41",
$b["body"]["contents"][0]["text"] = "".number_format($item["storage_percent"])."%";

// สถานะ
$situation_level_dict = [
    "1" => "น้ำน้อยวิกฤติ",
    "2" => "น้ำน้อย",
    "3" => "น้ำปานกลาง",
    "4" => "น้ำมาก",
    "5" => "น้ำล้นตลิ่ง",
];
$b["body"]["contents"][0]["text"] = $situation_level_dict[$item["situation_level"]];

// diff_wl_bank_text
$b["body"]["contents"][0]["text"] = $item["diff_wl_bank_text"];

// diff_wl_bank
$b["body"]["contents"][0]["text"] = $item["diff_wl_bank"];

// ------------------------------

// ระดับตลิ่ง
$b["body"]["contents"][0]["text"] = $item["station"]["min_bank"];

// ระดับน้ำ
$b["body"]["contents"][0]["text"] = $item["waterlevel_msl"];

// ระดับท้องน้ำ
$b["body"]["contents"][0]["text"] = $item["station"]["ground_level"];

// ------------------------------

// map https://www.google.com/maps/@14.1546271,100.6159917,15z
$b["body"]["contents"][0]["text"] = "https://www.google.com/maps/@{$item["station"]["tele_station_lat"]},{$item["station"]["tele_station_long"]},15z";

// ------------------------------
// id
$b["body"]["contents"][0]["text"] = $item["id"];


// agency
$b["body"]["contents"][0]["text"] = $item["agency"]["agency_name"]["th"];


?>