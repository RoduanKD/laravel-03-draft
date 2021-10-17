<?php

namespace App\Notifications;

use App\Channels\PusherChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\PusherPushNotifications\PusherMessage;

class MessageSent extends Notification implements ShouldQueue
{
    use Queueable;

    public $name;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->name = $message['name'];
        $this->message = substr($message['message'], 0, 50) . '...';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [PusherChannel::class, 'mail'];
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
                    ->line('a message was sent to us please check your admin panel.')
                    ->action('See Message', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toPushNotification($notifiable)
    {
        return PusherMessage::create()
            ->web()
            ->title($this->name . ' sent you a message!!')
            ->body($this->message)
            ->link(url('/'))
            ->sound('success');
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
