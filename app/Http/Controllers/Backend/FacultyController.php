<?php

namespace App\Http\Controllers\Backend;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacultyController extends Controller
{
    //
    public function index()
    {
        $faculties=Faculty::all();
        return view('backend.faculty.index')->withFaculties($faculties);
    }

    public function newFaculty(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'short_name'=>'required',
            'description'=>'required'
        ]);

        $faculty=new Faculty();
        $faculty->name=$request->input('name');
        $faculty->short_name=$request->input('short_name');
        $faculty->description=$request->input('description');
        $faculty->save();


        return redirect()->back();
    }
}
