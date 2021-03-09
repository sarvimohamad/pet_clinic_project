<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;

class VetController extends Controller
{
    public function index()
    {
        $list = Vet::query()->get();
        return view('vet.index', ['list' => $list]);
    }

    public function store(Request $request)
    {
        $vets = Vet::all()->toArray();

        if (count($vets)>0) {
            return redirect()->route('pet.index');
        } else {
            $vet = new Vet();

        $vet->user_id = $request->user()->id;
        $vet->speciality = $request->get('speciality');
        $vet->morning = $request->has('morning');
        $vet->afternoon = $request->has('afternoon');
        $vet->evening = $request->has('evening');
        $vet->save();
        return redirect()->route('pet.index');
    }
}

}
