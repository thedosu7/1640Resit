<?php

namespace App\Listeners;

use App\Events\CommentEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\ClickButton;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToIdeaOwnerAfterComment
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CommentEvent  $event
     * @return void
     */
    public function handle(CommentEvent $event)
    {
        //Delay after 5 seconds
        sleep(5);
        $user_receive_email = Auth::user()->email;
        //$user_receive_email = 'nhanvothanh719@gmail.com';
        $comment_content = substr($event->comment->content, 0, 10) . '...';
        $comment_user = User::findOrFail($event->comment->user_id)->name;
        Mail::send('emails.content', compact('comment_user', 'comment_content'), function($email) use($user_receive_email){
            $email->to($user_receive_email, 'Email receiver');
        });
    }
}
