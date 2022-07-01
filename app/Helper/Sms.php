<?php
namespace App\Helper;

use Illuminate\Support\Facades\Http;

class Sms {

    public static function send($message , $number)
    {
        $url="http://www.qyadat.com/sms/api/sendsms.php?username=966544411075&password=225588&message='.$message.'&numbers='.$number.'&sender=Droplet&unicode=u&return=json";
        return Http::get($url);
    }
}