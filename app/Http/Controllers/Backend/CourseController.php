<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    //
    public function index()
    {
        return view('backend.courses.index');
    }

    public function allDepartments()
    {
        return response()->json([
            'departments'=>Department::with('faculty')->get()
        ]);
    }

    public function newCourse(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'short_name'=>'required',
            'department_id'=>'required'
        ]);

        $course=new Course();
        $course->name=$request->input('name');
        $course->short_name=$request->input('short_name');
        $course->department_id=$request->input('department_id');
        $course->save();

        return redirect()->back();
    }

    public function allCourses()
    {
//        $courses=Course::select(['name','short_name','department_id']);
$courses=Course::all();
        return DataTables::of($courses)
            ->editColumn('department_id',function ($courses){

                $department=Department::find($courses->department_id);
                return $department->name;
//                return $courses->departmentSee($courses->department_id)->first()->name;
            })
        ->make(true);
    }
}
