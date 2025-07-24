<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('kontak.index');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $details = [
            'title' => $request->subject,
            'body'  => $request->message,
            'from'  => $request->email,
            'name'  => $request->name
        ];

        Mail::raw($details['body'], function ($message) use ($details) {
            $message->to('admin@dev-academy.my.id')
                    ->subject($details['title'])
                    ->replyTo($details['from'], $details['name']);
        });

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
