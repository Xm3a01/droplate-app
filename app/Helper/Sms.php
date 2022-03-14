<?php
namespace App\Helper;

use Illuminate\Support\Facades\Http;

class Sms {


    private const BASEURL = 'http://qyadat.com/sms/api/sendsms.php?username=user&password=pass';
    private const RETURNJSON = 'return=json';
    // private const PASSWORD = 'password=pass';
    // private const PASSWORD = 'pass';
    // username='.self::USERNAME.'
    // private const BASEURL = 'http://qyadat.com/sms/api/sendsms.php';


    public static function send($message , $number)
    {
       return Http::get(''.self::BASEURL.'&message=test&numbers=@mobile&sender=@sender&'.self::RETURNJSON.'');
    }
}