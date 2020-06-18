<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;


    public $boughts;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($boughts)
    {
        $this->boughts = $boughts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('norden371@yandex.ru')
            ->view('mails.boughts');
//            ->text('mails.boughts_text')
//            ->with(
//                [
//                    'testVarOne' => '1',
//                    'testVarTwo' => '2',
//                ]);
//            ->attach(public_path('/images').'/1589622530.jpg', [
//                'as' => '1589622530.jpg',
//                'mime' => 'image/jpeg',
//            ]);
    }
}
