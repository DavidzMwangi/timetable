<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    //
    public function AcademicYear()
    {
        return $this->hasOne(AcademicYear::class,'id','academic_year_id');
    }
}
