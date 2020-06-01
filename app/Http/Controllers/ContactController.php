<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    private function sendEmail( $from, $to, $subject, $view, $data, $emailFrom)
    {
        Mail::send($view, $data, function ($message) use($from, $to, $subject, $emailFrom)
        {
            $message -> from(env('MAIL_FROM'));
            $message -> to($to);
            $message -> subject($subject);
        });
    }

    public function contactEmail($name, $email, $telephone, $comment)
    {
        $subject = env('APP_NAME') . " - Nuevo contacto";
        $to = env('MAIL_TO');
        $view = 'contact_email';
        $from = $email;
        $data = [ 'data' => [
            'title' => env('APP_NAME') . " - Contacto",
            'name' => $name,
            'email' => $email,
            'telephone' => $telephone,
            'comment' => $comment,
        ]];

        $this->sendEmail($from, $to, $subject, $view, $data, $from);
    }

    public function contactSend(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'comment' => 'required',
            'condiciones' => 'required',
        ]);

        $this->contactEmail(
            $request['name'],
            $request['email'],
            $request['telephone'],
            $request['comment']
        );


        return redirect()->back();
    }
}
