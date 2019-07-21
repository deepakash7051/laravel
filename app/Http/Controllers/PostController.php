<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function custom($id, $name, $age){
       // return view('test')->with('id',$id );
        return view('test',compact('id','name','age'));
    }

    public function contact(){
        $people = ['akash','akshay','prateek','anshuman','shubham','maddy','annant'];
        return view('contact',compact('people'));
    }
}
