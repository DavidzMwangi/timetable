<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    public function Faculty()
    {
        return $this->hasOne(Faculty::class,'id','faculty_id');
    }


}
