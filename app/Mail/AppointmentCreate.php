<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentCreate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $appt_number;
    public function __construct($data,$appt_number)
    {
        $this->data = $data;
        $this->appt_number = $appt_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paul.anderson.b.garcia@gmail.com')->view('email.createappointment')->with('data',$this->data, 'appt_number', $this->appt_number);
    }
}
