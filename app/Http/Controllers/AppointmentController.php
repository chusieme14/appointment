<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentCreate;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function store(Request $request){
        $appointment = Appointment::create($request->toArray());
        Appointment::where('id',$appointment->id)->update(['appt_number' => 'APPT'.time().''.$appointment->id]);
        Mail::to($request->email)->send(new AppointmentCreate($appointment,'APPT'.time().''.$appointment->id));
    }
    public function getAllAppointments($id){
        return Appointment::with('department')->get();
    }
}
