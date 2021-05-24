<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'lname' => 'required',
            'fname' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'appt_date' => 'required',
            'reason' => 'required',
            'department_id' => 'required',

        ]);

        Appointment::create($request->toArray());
    }
}
