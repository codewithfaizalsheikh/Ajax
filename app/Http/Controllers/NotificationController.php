<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\myFirstNotification;
use Illuminate\Support\Facades\Notification;


class NotificationController extends Controller
{
    public function send_Offer_Notificatio(){
        $userSchema = User::first();

        $offerdata = [
            'greeting' => 'greeting',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'actionText' => 'Check out the offer',
            'offerurl' => url('/'),
            'offer_id' => 007
        ];
        $userSchema->notify(new myFirstNotification($offerdata));
        dd($userSchema->notifications);
    }
}
