<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class myFirstNotification extends Notification
{
    use Queueable;
    protected $offersdata;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($offersdata)
    {
        $this->offersdata = $offersdata;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->offersdata['greeting'])
                    ->line($this->offersdata['body'])
                    ->action($this->offersdata['actionText'], $this->offersdata['offerurl'])
                    ->line($this->offersdata['thanks']);
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
            'offer_id'=>$this->offersdata['offer_id']
        ];
    }
}
