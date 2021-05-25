<?php

namespace App\Http\Controllers;

use App\Http\Resources\vetresource;
use App\Models\Vet;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Auth;
use Session;


class VetController extends Controller
{
    public function index(Request $request)
    {

        $list = Vet::paginate(5);
        return view('vet.index', ['list' => $list]);
    }

    public function show($id)
    {
        $vet = User::find($id);
        return view('vet.show' , ['row'=>$vet]);
    }

    public function create()
    {

        return view('vet.create');
    }

    public function store(Request $request )
    {

        $result = Gate::inspect('checkIsAdmin' , $request->user());
        if(!$result->allowed()){
            abort(403);
        }
        $user = User::where('email',$request->email)->first();



        if ($user === null || isset($user->vet))   {
            Session::flash('message', "User not found!");
            return redirect()->route('pet.index');
        } else {
            $vet = new Vet();

        $vet->user_id = $user->id;
        $vet->speciality = $request->get('speciality');
        $vet->morning = $request->has('morning');
        $vet->afternoon = $request->has('afternoon');
        $vet->evening = $request->has('evening');
        $vet->save();
        return redirect()->route('pet.index');
    }
}

    public function VetListApi(Request $request)
    {
        $vetList=Vet::orderby('vets.id',$request->get('sort' , 'asc'))->join('users' , 'user_id' , 'users.id');
        if($request->has('search')){
            $vetList->where('users.email' , $request->search);
        }
        if($request->has('searchByName')){
            $vetList->where('users.name' ,'like', "%$request->searchByName%");
        }
        $vetList = $vetList->get()->all();

//        $collection = collect();
//
//        foreach ($vetList as $vet){
//            $vetdata = [
//                'name'=>$vet->user->name,
//                'vet_id'=>$vet->id
//            ];
//            $collection->push($vetdata);
//        }

//
//        return response()->json(['vetlist'=>$collection]);

        return vetresource::collection($vetList);

}

    public function VetDetailApi($id)
    {
    $vetdetail=Vet::find($id);
    return new vetresource($vetdetail);

}

    public function vetCreate(Request $request)
    {
        //$user = User::where('email',$request->email)->first();


//        if ($user === null || isset($user->vet))   {
//            Session::flash('message', "User not found!");
//            return response('tessssssssssst');
//        } else {
//        $user = User::where('id',$request->id)->first();

            $vet = new Vet();

            $user = User::where('email',$request->email)->first();
            if($user === null){
                return response('',404);
            }
            $vet->user_id = $user->id;
            $vet->speciality = $request->get('speciality');
            $vet->morning = $request->has('morning') ? $request->morning : false;
            $vet->afternoon = $request->has('afternoon') ? $request->afternoon : false;
            $vet->evening = $request->has('evening') ? $request->evening : false;
            $vet->save();

        return new vetresource($vet);

}


}
