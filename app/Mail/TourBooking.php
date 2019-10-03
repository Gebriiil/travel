<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TourBooking extends Mailable
{
    use Queueable, SerializesModels;

    public $tour;
    public $name;
    public $phone;
    public $email;
    public $arrival_date;
    public $departure_date;
    public $adults;
    public $childrens;
    public $msg;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $tour,
                                $name,
                                $phone,
                                $email,
                                $arrival_date,
                                $departure_date,
                                $adults,
                                $childrens,
                                $msg)
    {
        $this->subject = $subject;
        $this->tour = $tour;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->arrival_date = $arrival_date;
        $this->departure_date = $departure_date;
        $this->adults = $adults;
        $this->childrens = $childrens;
        $this->msg = $msg;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->subject($this->subject)->view('notifications.reservation_notification',
            [
                '$tour' => $this->tour,
                '$name' => $this->name,
                '$phone' => $this->phone,
                '$email' => $this->email,
                '$arrival_date' => $this->arrival_date,
                '$departure_date' => $this->departure_date,
                '$adults' => $this->adults,
                '$childrens' => $this->childrens,
                '$msg' => $this->msg
            ]);
    }
}
