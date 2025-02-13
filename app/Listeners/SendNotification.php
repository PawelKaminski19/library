<?php

namespace App\Listeners;

use Mail;
use App\Mail\BookCreated as BookCreatedEmail;
use App\Events\BookCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotification
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
     * @param  BookCreated  $event
     * @return void
     */
    public function handle(BookCreated $event)
    {
        Mail::to("kk01022010@o2.pl")->send(new BookCreatedEmail($event->book));
        \Log::info("Email został wysłany!");
    }
}
