<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use App\Models\User;
use App\Notifications\EmailNotification;
use App\Mail\TestMail;
use Mail;
use App\Jobs\SendMailJob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function adminHome()
    {
        return view('adminHome');
    }
    public function send()
    {
        $user = User::first();

        $project = [
            'greeting' => 'Hello '.$user->name.',',
            'body' => 'This is the project assigned to you.',
            'thanks' => 'Thank you this is from vasu mathukiya',
            'actionText' => 'View Project',
            'actionURL' => url('/'),
            'id' => 40
        ];

        Notification::send($user, new EmailNotification($project));

        dd('Notification sent!');
    }
    public function testMail()
    {
        $mail = 'vasum.wot2022@gmail.com';
        Mail::to($mail)->send(new TestMail);

        dd('Mail Send Successfully !!');
    }
    public function sendMail()
    {
//        dd('123');
        $details['to'] = 'vasum.wot2022@gmail.com';
        $details['name'] = 'Mr. WOT 2022 Fresher';
        $details['subject'] = 'Hello Laravel';
        $details['message'] = 'Have a nice day';

        SendMailJob::dispatch($details)
            ->delay(now()->addMinutes(5));

        return response('Email sent successfully.....');
    }
}
