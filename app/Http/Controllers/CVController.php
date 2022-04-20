<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CVs;

class CVController extends Controller
{
    // deleting a cv
    // public function destroy(){
    //     dd(request()->all());
    // }

    // Creating controller actions
    public function listAllCVs(){
        return view("/list", array("cvs"=>CVs::all()));
    }

    public function listIndividualCV($id){
        $cv = CVs::find($id);
        return view("/show", array("cv" => $cv));
    }

    public function return_user_created_cvs(){
        $cvs = CVs::where("user_id", "LIKE", Auth::user()->id);
        
        return view("/", compact("cvs"));
    }

    public function indexPage(){
        return view("/index");
    }

    public function search(){
        $search_text = $_GET["query"];

        $cvs = CVs::where("name", "LIKE", "%".$search_text."%")
        ->orWhere("keyProgrammingLanguage","LIKE", "%".$search_text."%")
        ->get();
        
        return view("/search", compact("cvs"));
    }

    public function index(){
        $cvs = CVs::all();
        return view('/');
        // return view("cvs.index", ["cvs"=>$cvs]);
    }

    public function edit(CVs $cv){
        return view("cvs.edit", ["cv" => $cv]);
    }

    public function update(CVs $cv){
        
        request()->validate([
            "name" => "required",
            "email" => "required",
        ]);

        $cv->update([
            "name" => request("name"),
            "email" => request("email"),
            "keyProgrammingLanguage" => request("keyProgrammingLanguage"),
            "education" => request("education"),
            "profile" => request("profile"),
            "URLlinks" => request("URLlinks"), 
        ]);

        return redirect("/");
    }

    public function create(){
        return view("cvs.create");
    }


    public function store() {

        request()->validate([
            "name" => "required",
            "email" => "required",
        ]);

        CVs::create([
            "name" => request("name"),
            "email" => request("email"),
            "keyProgrammingLanguage" => request("keyProgrammingLanguage"),
            "education" => request("education"),
            "profile" => request("profile"),
            "URLlinks" => request("URLlinks"), 
            "user_id" => Auth::user()->id,
            // "user_id" => Auth::user()->id,
        ]);

        return redirect("/");
        // echo Auth::user()->id;
    }

    public function check(CVs $cv){
        echo "Hello captain Lionel";
    }
}
