<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $id ;
    public $email;
    public $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id,$email,$message)
    {
        $this->id = $id;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('info@panoramaegypttours.com')->send(new ContactUsMail('Message id: ' . $this->id, 'Email address ' . $this->email . ' has been sent a message : ' . $this->message));

    }
}
