<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $number;
    public $subject;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mess)
    {
      $this->name = $mess['name'];
      $this->email = $mess['email'];
      $this->number = $mess['mobile'];
      $this->subject = $mess['subject'];
      $this->message = $mess['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from(config('mail.to'))
                  ->subject($this->subject)
                  ->replyTo($this->email)
                  ->view('emails.contact');
        //return $this->view('view.name');
    }
}
