<?php

namespace App\Mail;

use App\Models\Appointment;
use App\Models\Vet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $vet;
    public $appointment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Vet $vet,Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->vet = $vet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.vetmail');
    }
}
