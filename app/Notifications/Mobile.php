<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Mobile extends Notification
{
    use Queueable;


    public $promo;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($promo)
    {
        $this->promo = $promo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'You promo code to used in Droplate app',
            'code' => $this->promo,
        ];
    }
}
