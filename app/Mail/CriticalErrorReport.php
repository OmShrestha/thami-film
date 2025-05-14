<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Exception;

class CriticalErrorReport extends Mailable
{
    use Queueable, SerializesModels;

    public $e;
    public $browser;

    public function __construct(Exception $e, $browser)
    {
        $this->e = $e;
        $this->browser = $browser;
    }

    public function build()
    {
        $linebreak = "<br>";
        $messageBody = 'Error Message => ' . $this->e->getMessage() . $linebreak . $linebreak .
            'File Name => ' . $this->e->getFile() . $linebreak .
            'Line Number => ' . $this->e->getLine() . $linebreak . $linebreak .
            'Request URL => ' . request()->url() . $linebreak .
            'Request Method => ' . request()->method() . $linebreak .
            'Request IP => ' . request()->ip() . $linebreak . $linebreak .
            'Browser => ' . $this->browser . $linebreak . $linebreak .
            'Full Error => ' . $linebreak . $linebreak .
            $this->e->getTraceAsString() . $linebreak;

        return $this->from(config('mail.from.address'))
            ->subject('Website System Error!')
            ->with(['messageBody' => $messageBody])
            ->view('mail.error');
    }
}
