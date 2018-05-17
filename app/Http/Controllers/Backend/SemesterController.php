<?php

namespace App\Http\Controllers\Backend;

use App\Models\AcademicYear;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class SemesterController extends Controller
{
    //
    public function index()
    {
        return view('backend.semester.index');
    }

    public function academicSem()
    {
        $a=AcademicYear::all();
        return response()->json([
            'academic'=>AcademicYear::all()->toArray()
        ]);
    }

    public function newSemester(Request $request)
    {

        $sem=new Semester();
        $sem->semester_type=$request->input('semester_type');
        $sem->weeks=$request->input('weeks');
        $sem->start_date=$request->input('start_date');
        $sem->end_date=$request->input('end_date');
        $sem->academic_year_id=$request->input('academic_year');
        $sem->save();

        return redirect()->back()->withErrors(['data_saved'=>1]);

    }

    public function allSemRecords()
    {


        $sem=Semester::select(['id','semester_type','weeks','start_date','end_date','academic_year_id']);

        return DataTables::of($sem)
            ->editColumn('academic_year_id',function ($sem){
                return $sem->academicYear->duration;
            })
            ->addColumn('actions',function ($sem){
                return '<a href="#"  >
                   <i class="material-icons" title="Edit">mode_edit</i> <span class="icon-name" ></span>  </a>
                   <a href="'. url('backend/delete_semester/'.$sem->id).'"  >
                    <i class="material-icons" title="Delete">mode_delete</i>
                   <span class="icon-name" ></span>  
                     </a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function deleteSemester(Semester $sem_id)
    {
        try {
            $sem_id->delete();
        } catch (\Exception $e) {


        }

        return redirect()->back();
    }
}
