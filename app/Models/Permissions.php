<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Permissions extends Model
{
    use HasFactory;

    protected $table = "permissions";

    public function children(){

        return $this->hasMany('App\Models\Permissions','parent_id','id');

    }
    public function parent(){

        return $this->hasOne('App\Models\Permissions','id','parent_id');

    }
}
