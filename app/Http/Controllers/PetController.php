<?php

namespace App\Http\Controllers;

use App\Models\CategoryPet;
use App\Models\Pet;
use App\Models\User;
use App\Models\Vet;
use App\Http\Resources\petresource;

use http\Env\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Resource_;


class PetController extends Controller
{
    public function index(Request $request)
    {
        //policy

        $result = Gate::inspect('show' , $request->user());
//        dd($result);
        if ($result->allowed()){
            return redirect()->route('vet.show', ['id' => $request->user()]);
        }


        $deleted_pet_id = session('deleted_pet', false);
        $categories = CategoryPet::all();
        $vets = Vet::all();
        $pets = Pet::where('user_id', $request->user()->id)->get();
        return view('user.index',
            ['pets' => $pets, 'categories' => $categories, 'vets' => $vets, 'deleted_pet' => $deleted_pet_id]);


    }



    public function create(Request $request )
    {

        //policy
        //dd(Gate::inspect('show' , $request->user()));
        if (Gate::inspect('show', $request->user())) //dd($result);
        {


            $validated = $request->validate([

                'age' => 'required|Integer',
            ]);

            $pet_image = null;
            if ($request->hasFile('pet_img') && $request->file('pet_img')->isvalid()) {
                $pet_image = $request->pet_img->store('image');

            }


            $pet = new Pet();
            $pet->name = $request->get('name');
            $pet->age = $request->get('age');
            $pet->user_id = $request->user()->id;
            $pet->category_pets_id = $request->category_pets_id;
            $pet->image = $pet_image;
            $pet->save();


            return back();

    }else{
abort(403);
}
}

    public function edit($userId, $petId)
    {
        $categories = CategoryPet::all();
        $pet = Pet::query()->where('id', $petId)->first();
        return view('pet.edit', ['pet' => $pet, 'user' => $userId, 'categories' => $categories]);
    }

    public function update(Request $request, $userId, $petId)
    {

        $validated = $request->validate([
            'category_pets_id' => 'required',
        ]);
        $pets = Pet::query()->find($petId);

//        $pets = Pet::query()->find($request->id);
        $pets->category_pets_id = $request->category_pets_id;
        $pets->name = $request->get('name');
        $pets->age = $request->get('age');
        $pets->user_id = $request->user()->id;
        $pets->save();

        return redirect()->route('pet.index');


//        $pet->update($request->toArray());

//        $pet = Pet::query()->find($id);
//       dd($pet);
//        $pet->type = $request->input('type');
//        $pet->name = $request->input('name');
//        $pet->age = $request->input('age');
//        $pet->user_id = $request->user()->id;
//        $pet->save();
//        return redirect()->route('pet.index');
//

    }

    public function destroy(Request $request, $id)
    {
        $request->session()->flash('deleted_pet', $id);
        Pet::where('id', $id)->delete();
        return redirect()->route('pet.index');

    }

    public function undo(Request $request, $id)
    {
        Pet::where('id', $id)->withTrashed()->restore();
        return redirect()->route('pet.index');

    }



    //api ----->>>>

    public function petListApi()
    {
        $pets = Pet::all();
        return petresource::collection($pets);
    }

    public function petDetailListApi(Request $request)
    {
        $pet = Pet::find($request->id);
        if (isset($pet)){
        return new petresource($pet);
    }else{
            return response('no found this id',400);
        }
    }
}
