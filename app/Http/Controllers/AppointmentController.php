<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Vet;
use Illuminate\Http\Request;

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
        $appointment->vet_id = $vetId;
        $appointment->save();

        return redirect()->route('appointment.index',['vet_id'=>$vetId]);
    }
}

