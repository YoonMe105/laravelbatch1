<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class membersController extends Controller
{
    public function index(){

        $header = "This is my First template with data passing";

        $students = [
            "Honey Nway Oo",
            "Mandalay",
            "093333"
        ];

        return view('members/index',compact('header','students'));
    }
}

