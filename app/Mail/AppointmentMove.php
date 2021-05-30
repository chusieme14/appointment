<?php

namespace App\Mail;

use App\Models\Appointment;
use App\Models\Department;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentMove extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $department;
    public function __construct($data,$department)
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
        if($this->data->isdate)
            return $this->view('email.movedateappointment')->with('data',$this->data);
        if($this->data->isdepartment){
            return $this->view('email.movedepappointment')->with('data',$this->data ,'department',$this->department);
        }
        if($this->data->both){
            return $this->view('email.movebothappointment')->with('data',$this->data, 'department',$this->department);
        }
    }
}
