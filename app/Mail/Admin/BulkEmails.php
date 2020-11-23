<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BulkEmails extends Mailable
{
    use Queueable, SerializesModels;
    public $intro;
    public $message;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($intro, $message, $user)
    {
        $this->intro = $intro;
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New email update from Youvatrade')
                    ->markdown('email.admin.bulk');
    }
}
