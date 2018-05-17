<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    //
    public function getDurationAttribute()
    {
//        return $this->year;
        return json_decode($this->year)->start_year . ' - ' . json_decode($this->year)->end_year;
    }

    public function getRoeAttribute(){
        return $this->id;
    }
}
