<?php

namespace App\Mail;

use App\Http\Requests\ContactStoreRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $contactData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $contactData )
    {
        $this->contactData = $contactData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('eugene.shalko.00@gmail.com', 'Test')
            ->view('mail.index')
            ->with([
                'contactName' => $this->contactData->name,
                'contactEmail' => $this->contactData->email,
                'contactSubject' => $this->contactData->subject,
                'contactMessage' => $this->contactData->text,
            ]);
    }
}
