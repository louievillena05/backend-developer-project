<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $email, $website;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $website)
    {
        $this->name = $name;
        $this->email = $email;
        $this->website = $website;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mail@fullstackhqproject.test', 'FullStackHQ Project')
            ->subject('New Company Created')
            ->markdown('mails.notif')
            ->with([
                'name' => 'Admin',
            ]);
    }
}
