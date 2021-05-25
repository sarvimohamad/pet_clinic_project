<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Vet;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Mail\VetMail;
use Mail;

class AppointmentController extends Controller
{
    public function index(Request $request,$vetId)
    {
        $vet = Vet::find($vetId);
        $pets = Pet::where('user_id',$request->user()->id)->get();

        return view('appointment.index' , ['vet'=>$vet ,'pets'=>$pets]);
    }

    public function book(Request $request,$vetId)
    {
        $appointment = new Appointment();
        $appointment->appointment_date = $request->get('date');
        $appointment->{$request->get('time')} = 1;
        $appointment->pet_id = $request->get('pet');
        $appointment->user_id = $request->user()->id;
        $appointment->vet_id = $vetId;
        $appointment->save();

        $request->session()->flash('massage' ,'success added');

        //send mail
        $vetmail = new VetMail($appointment->vet , $appointment);
        Mail::to($request->user())->queue($vetmail);

        return redirect()->route('appointment.index',['vet_id'=>$vetId]);
    }

    public function list(Request $request)
    {
        $get_appointment_id = session('deleted_at' , false);

        $lists = Appointment::where('user_id' ,$request->user()->id)->get();
        return view('appointment.list', ['lists'=>$lists , 'get_appointment_id'=>$get_appointment_id]);
    }

    public function destroy(Request $request,$id)
    {
        $appointment = Appointment::find($id);

       //dd(Gate::denies('delete' , $appointment),Gate::inspect('delete' , $appointment));
        if(!Gate::allows('delete' , $appointment)) {
            return response('permission denied', 403);
            // The action is authorized...

        }
        //dd('after_if');
        $request->session()->flash('deleted_at' ,$id);

        Appointment::where('id' , $id)->delete();
        return back();

    }




public function undo($id)
    {

        Appointment::where('id' , $id)->withTrashed()->restore();
        return back();
    }
}

