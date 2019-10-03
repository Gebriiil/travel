<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUs;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Jobs\EmailJob;



class ContactUsController extends Controller
{

    public function index()
    {
        return view('front.contactus');
    }


    public function sendMessage(ContactUsRequest $request)
    {
        $message = Contact::create($request->all());

       Mail::to('info@signaturetoursegypt.com')->send(new ContactUs('Message id: ' . $message->id, 'Email address ' . $request->email . ' has been sent a message : ' . $request->msg_body));

        if (is_object($message)) {
            //$job = (new EmailJob( $message->id,$request->email,$request->msg_body))->delay(\Carbon\Carbon::now()->addSeconds(5));
            //dispatch(new EmailJob( $message->id,$request->email,$request->msg_body))->delay(\Carbon\Carbon::now()->addSeconds(5));

            return response(
                [
                    "code" => 1,
                    "msg" => trans('site.sent_succesfully'),
                ]
            );

        } else {
            return response(
                [
                    "code" => 0,
                    "msg" => trans('site.failed_to_send'),
                ]
            );
        }


    }


}
