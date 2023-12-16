<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "tbl_roles";
    protected $fillable = ['id', 'title',];

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'tbl_permission_roles');
    }
}
