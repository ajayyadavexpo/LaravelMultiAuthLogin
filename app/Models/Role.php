<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];

    public function permissions(){
        return $this->belongsTomany(Permission::class,'roles_permissions');
    }

    public function users(){
        return $this->belongsTomany(User::class,'users_roles');
    }


}
