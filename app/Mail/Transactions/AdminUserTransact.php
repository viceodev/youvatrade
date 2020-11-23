<?php

namespace App\Mail\Transactions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminUserTransact extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $transaction;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $transaction, $message)
    {
        $this->user = $user;
        $this->transaction = $transaction;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Transaction Update')
                    ->markdown('email.transaction.admin');
    }
}
