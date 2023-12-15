<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "tbl_roles";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
