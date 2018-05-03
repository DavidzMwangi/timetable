<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermRole extends Model
{
    //
    protected $table = "permission_role";

    public function Role(){
        return $this->hasOne(Role::class,'id','role_id');
    }

    public function Permission()
    {
        return $this->hasOne(Permission::class,'id','permission_id');
    }

    public function allPermission()
    {
        return Permission::all();
    }
}
