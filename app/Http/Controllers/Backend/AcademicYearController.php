<?php

namespace App\Http\Controllers\Backend;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcademicYearController extends Controller
{
    //
    public function index()
    {
        return view('backend.academic_years.index');
    }

    public function newAcademic(Request $request)
    {
        $start=$request->input('start_year');
        $end=$request->input('end_year');
        $year=json_encode(['start_year'=>$start,'end_year'=>$end]);

                $aca=new AcademicYear();
                $aca->year=$year;
                $aca->save();


        return response()->json([
//            'silly'=>$year,
            'success'=>true
        ]);
    }

    public function academicYears()
    {
        $academics=AcademicYear::all();
//        $academics=AcademicYear::first();

        foreach ($academics as $academic){
            $durations[]=$academic->duration;

        }

        return response()->json([
            'academics'=>$durations,
        ]);
    }
}
