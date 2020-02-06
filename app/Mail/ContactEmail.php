<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $name, String $email, String $subject, String $msg)
    {
        $this->data = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'msg' => $msg
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['email'], $this->data['name'])
            ->replyTo($this->data['email'])
            ->subject($this->data['subject'])
            ->view('pages.email.contactemail')
            ->with('msg', $this->data['msg']);
    }
}
