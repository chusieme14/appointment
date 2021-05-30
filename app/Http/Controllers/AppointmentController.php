<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentAccept;
use App\Mail\AppointmentCreate;
use App\Mail\AppointmentMove;
use App\Mail\AppointmentRemove;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\User;
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
    public function getAllWaiting($id){
        $user = User::findorfail($id);
        if($user->role_id == 1){
            return Appointment::with('department')->where('status',0)->get();
        }else{
            return Appointment::with('department')->where(['status'=>0,'department_id'=>$user->department_id])->get();
        }
    }
    public function accept(Request $request){
        Appointment::where('id',$request->id)->update([
            'status' => 1,
            'user_id' => $request->user_id
        ]);
        Mail::to($request->email)->send(new AppointmentAccept($request));
    }
    public function move(Request $request){
        Appointment::where('id',$request->id)->update([
            'appt_date' => $request->appt_date,
            'department_id' => $request->department_id,
            'user_id' => $request->user_id
        ]);
        $department = Department::where('id',$request->department_id)->first();
        Mail::to($request->email)->send(new AppointmentMove($request,$department));
    }
    public function destroy(Appointment $appt){
        $appt->delete();
        $department = Department::where('id',$appt->department_id)->first();
        Mail::to($appt->email)->send(new AppointmentRemove($appt,$department));
    }
    public function getAllApproved($id){
        $user = User::findorfail($id);
        if($user->role_id == 1){
            return Appointment::with('department','user')->where('status',1)->get();
        }else{
            return Appointment::with('department','user')->where(['status'=>1,'department_id'=>$user->department_id])->get();
        }
    }
}
