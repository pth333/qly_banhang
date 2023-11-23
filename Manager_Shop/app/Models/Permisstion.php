<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisstion extends Model
{
    protected $guarded = [];
    public function permisstionChildren()
    {
        return $this->hasMany(Permisstion::class, 'parent_id');
    }
    use HasFactory;
}
