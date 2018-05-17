<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function Department()
    {
        return $this->hasOne(Department::class,'department_id','id');
    }

    public function scopeDepartmentSee($query,$deparment_id)
    {
        $query->where('department_id',$deparment_id);
    }
}
