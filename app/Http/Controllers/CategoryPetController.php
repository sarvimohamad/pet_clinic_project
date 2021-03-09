<?php

namespace App\Http\Controllers;

use App\Models\CategoryPet;
use Illuminate\Http\Request;

class CategoryPetController extends Controller
{



    public function index()
    {
        $categories = CategoryPet::query()->get();
        return view('categorypet.index',['categories'=>$categories]);
    }
}
