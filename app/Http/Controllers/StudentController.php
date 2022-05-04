<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{
    public function index()
    {
        $user = User::first();

        $enrollmentData = [
            'body' => 'you receive a new text notification',
            'enrollmentText' => 'You are allowed to enroll',
            'url' => url('/'),
            'thankyou' => 'you have 14 days to enroll',
        ];

      //  $user->notify(new EmailNotification($enrollmentData));

      Notification::send($user, new StudentNotification($enrollmentData));
    }
}
