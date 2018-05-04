<?php

namespace App\Http\Controllers\Backend;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;

class DepartmentController extends Controller
{
    //
    public function index()
    {
        $departments=Department::with('faculty')->get();
        $faculties=Faculty::all();
        return view('backend.department.index')->withDepartments($departments)->withFaculties($faculties);
    }

    public function newDepartment(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'short_name'=>'required',
            'description'=>'required',
            'faculty_id'=>'required'
        ]);

        $selected_department_id=$request->input('selected_department_id');
        if ( $request->input('selected_department_id')==null || $request->input('selected_department_id')==""){
            $department = new Department();

        }else {
            $department=Department::find($selected_department_id);

        }
        $department->name=$request->input('name');
        $department->short_name=$request->input('short_name');
        $department->description=$request->input('description');
        $department->faculty_id=$request->input('faculty_id');
        $department->save();


        return redirect()->back();
    }

    public function editDepartment(Department $department_id)
    {

        return response()->json([
            'department'=>$department_id,
            'faculties'=>Faculty::all(),
        ]);
    }

    public function facultiesForDepartment()
    {
        return response()->json([
            'faculties'=>Faculty::all()
        ]);
    }

    public function deleteDepartment(Department $department_id)
    {
        try {
            $department_id->delete();
        } catch (\Exception $e) {
            return redirect()->withErrors(new MessageBag(['unknown'=>'Unknown Error, please retry']))->back();
        }

        return redirect()->back();

    }
}
