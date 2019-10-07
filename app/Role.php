<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['id','title'];
    public $timestamps = true;
    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
