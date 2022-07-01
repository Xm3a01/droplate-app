<?php

namespace App\Helper;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class Notification
{
    public static function send($request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = config('app.fcm');

        // dd($SERVER_API_KEY);

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                'notification_id' => $request->id,
                "title" => $request->title,
                "body" => $request->content,
            ]
        ];
        $dataString = json_encode($data);

        $response = Http::withHeaders([
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ])->post('https://fcm.googleapis.com/fcm/send',[$dataString]);
        

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        // $response = curl_exec($ch);

        // return back()->with('success', 'Notification send successfully.');
        return $response;
    }
}
