<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
class SendTwoFactorCode extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @return void
     */



    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable){
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(User $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Your two factor code is {$this->otp_code}')
                    ->line('Your verification code is'.$notifiable->verfication_code)
                    ->line('The code will expire in 10 minutes')
                    ->line('If you have not tried to login, ignore this message');

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
            //
        ];
    }
}
