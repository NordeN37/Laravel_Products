<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($objMaleBoughts)
    {
        $this->objMaleBoughts = $objMaleBoughts;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('norden37@yandex.ru')
            ->view('vendor.voyager.mail.master.index')
            ->with([
                'objMaleBoughts' => $this->objMaleBoughts
            ]);
    }
}
