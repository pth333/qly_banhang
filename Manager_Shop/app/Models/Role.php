<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public function permisstions(){
        return $this->belongsToMany(Permisstion::class,'permission_role','role_id','permission_id')
        ->withTimestamps();
    }
    use HasFactory;
}
