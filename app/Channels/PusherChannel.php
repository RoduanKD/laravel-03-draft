<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PusherChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toPushNotification($notifiable)->toArray();

        // Send notification to the $notifiable instance...
        $instance_id = config('services.pusher.beams_instance_id');
        $response = Http::withToken(config('services.pusher.beams_secret_key'))->post("https://${instance_id}.pushnotifications.pusher.com/publish_api/v1/instances/${instance_id}/publishes",
        array_merge([
            'interests' => ['hello']
        ], $message));
        Log::debug($response);
    }
}
