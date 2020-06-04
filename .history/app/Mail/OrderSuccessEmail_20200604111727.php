<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSuccessEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$refference_number)
    {
        $this->name = $name;
        $this->refference_number = $refference_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
           
        return $this->from(env('MAIL_FROM'))->view('email.order_success')
        ->with([
            'url' => $this->url,
            'name' => $this->name
        ]);
    }
}
