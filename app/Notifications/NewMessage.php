<?php

namespace App\Notifications;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification
{
    protected $sender;
    protected $content;

    public function __construct($sender, $content)
    {
        $this->sender = $sender;
        $this->content = $content;
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
    public function toDatabase($notifiable)
    {
        return [
            'sender' => $this->sender,
            'content' => $this->content,
            'timestamp' => now()
        ];
    }
}
