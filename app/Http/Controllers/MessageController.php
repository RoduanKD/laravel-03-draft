<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Notifications\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        // 1. validation
        // 2. Store message content to DB
        // if message is stored in DB
        // send Email
        // dd($request->all());
        $name = $request->name;
        Mail::to($request->email)->send(new WelcomeEmail($name));
        $user = User::first();
        $user->notify(new MessageSent($request->only(['name', 'message'])));
        // send notification to pusher
        // $instance_id = config('services.pusher.beams_instance_id');
        // Http::withToken(config('services.pusher.beams_secret_key'))->post("https://${instance_id}.pushnotifications.pusher.com/publish_api/v1/instances/${instance_id}/publishes",
        // [
        //     'interests' => ['hello'],
        //     'web'       => [
        //         'notification'  => [
        //             'title' => 'Hello',
        //             'body'  => 'Hello, world!'
        //         ]
        //     ]
        // ]);

        return redirect()->back()->with('success', 'Your email was sent');
    }
}
