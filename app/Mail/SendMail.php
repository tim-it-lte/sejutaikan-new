<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable {
    use Queueable, SerializesModels;
    public $data;

    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        // return $this->markdown('emailku');
        return $this->markdown('emailku')
            ->subject('Informasi Akun Dari Dinas Kelautan Dan Perikanan Prov. Sulawesi Selatan')
            ->with('data', $this->data)
        // ->attach(public_path('/img/logo.png'), [
        //     'as'   => 'logo.png',
        //     'mime' => 'image/png',
        // ]);
        ;
    }
}
