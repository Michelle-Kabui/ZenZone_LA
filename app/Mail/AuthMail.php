<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;


class AuthMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }
 /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
{
    $resetToken = $this->mailData['resetToken'];
    $resetUrl = url('/password/reset', $resetToken);

    return $this->subject('WELCOME TO ZENZONE!')
                ->view('emails.ResetMail')
                ->with('resetUrl', $resetUrl);
}
}
