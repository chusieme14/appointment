<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentRemove extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $department;
    public function __construct($data, $department)
    {
        $this->data = $data;
        $this->department = $department;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('paul.anderson.b.garcia@gmail.com')->view('email.removeappointment')->with('data',$this->data ,'department',$this->department);
    }
}
