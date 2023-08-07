<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LineMessageAPI extends Model
{
    use HasFactory;


    public  function replyUser($requestData)
    {
        // for verify only
        if (count($requestData["events"]) == 0)  return;
        $event = $requestData["events"][0];

        $messages = [];
        switch ($event["message"]["type"]) {
            case "text":
                $text = $event["message"]["text"];
                if (str_contains($text, "ปัจจุบัน")) {
                    $m1 = $this->replyWithFlexCarousel($event);
                    $m2 = $this->replyWithText($event, "https://thungsongflood.org");
                    $messages[] = $m1;
                    $messages[] = $m2;
                } else if (str_contains($text, "คาดการณ์")) {
                    $this->replyWithText($event, "https://thungsongflood.org/statistic");
                } else if (str_contains($text, "ภาพถ่าย") || str_contains($text, "ถ่ายภาพ")) {
                    $this->replyWithQuickReply($event, "quick_reply.json");
                } else {
                    $this->replyWithText($event, "Hello World");
                }
                break;
            case "location":
                $this->replyWithFlexCarousel($event);
                break;
            case "sticker":
                $this->replyWithFlexBubble($event);
                break;
            case "image":
                // $this->imageHandler($event);
                break;
        }
        $this->replyMessages($event, $messages);
    }

    public  function replyWithQuickReply($event, $filename)
    {
        $template_path = storage_path('../public/json/' . $filename);
        $string_json = file_get_contents($template_path);
        $message = json_decode($string_json, true);
        $this->reply($event, $message);
    }
    public  function replyWithFlexCarousel($event)
    {
        $template_path = storage_path('../public/flex-templates/now.json');
        $string_json = file_get_contents($template_path);
        // custom
        $json = json_decode($string_json, true);
        $template_bubble = array_merge([], $json["contents"][0]);
        $json["contents"] = [];
        // data        
        $data = json_decode(file_get_contents("https://thungsongflood.org/api/now/wl"), true);
        foreach ($data as $item) {
            $b = array_merge([], $template_bubble);
            // $b["body"]["contents"][0]["text"] = "hey";
            $b["body"]["contents"][0]["text"] = "สถานี".$item["station"]["tele_station_name"]["th"];
            $json["contents"][] = $b;
            // break;
        }

        // end custom
        $message = [
            "type" => "flex",
            "altText" => "สถานีระดับน้ำในอำเภอทุ่งส่งล่าสุด",
            "contents" => $json,
        ];

        return $message;
        // $this->reply($event, $message);
    }
    public  function replyWithFlexBubble($event)
    {
        $template_path = storage_path('../public/flex-templates/bubble.json');
        $string_json = file_get_contents($template_path);
        $message = [
            "type" => "flex",
            "altText" => "สถานที่ใกล้คุณ",
            "contents" => json_decode($string_json, true),
        ];

        return $message;
        // $this->reply($event, $message);
    }

    // public  function replyImage($event, $image)
    // {
    //     $message = [
    //         "type" => "text",
    //         "text" => $image,
    //     ];        
    //     $this->reply($event, $message);
    // }

    public  function replyWithText($event, $text)
    {
        $message = [
            "type" => "text",
            "text" => $text,
        ];
        return $message;
        // $this->reply($event, $message);
    }

    public  function reply($event, $message)
    {
        //GET ONLY FIRST EVENT
        $replyToken = $event["replyToken"];

        // echo $event;
        // $channel_access_token = $this->channel_access_token;
        // $event['message'] = ['id' => ''.$data['msgocrid'] ];
        $body = [
            "replyToken" => $replyToken,
            "messages" => [$message],
        ];

        $opts = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n" .
                    'Authorization: Bearer ' . env('LINE_CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];

        $context  = stream_context_create($opts);
        //https://api-data.line.me/v2/bot/message/11914912908139/content
        $url = "https://api.line.me/v2/bot/message/reply";
        $result = file_get_contents($url, false, $context);
        file_put_contents('../storage/logs/log.txt', $result . PHP_EOL, FILE_APPEND);
    }

    public  function replyMessages($event, $messages)
    {
        //GET ONLY FIRST EVENT
        $replyToken = $event["replyToken"];

        // echo $event;
        // $channel_access_token = $this->channel_access_token;
        // $event['message'] = ['id' => ''.$data['msgocrid'] ];
        $body = [
            "replyToken" => $replyToken,
            "messages" => $messages,
        ];

        $opts = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n" .
                    'Authorization: Bearer ' . env('LINE_CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];

        $context  = stream_context_create($opts);
        //https://api-data.line.me/v2/bot/message/11914912908139/content
        $url = "https://api.line.me/v2/bot/message/reply";
        $result = file_get_contents($url, false, $context);
        file_put_contents('../storage/logs/log.txt', $result . PHP_EOL, FILE_APPEND);
    }
}
