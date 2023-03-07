<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects_To_Amenities extends Model
{
    use HasFactory;
    protected $table = "project_to_amenity";
    protected $connection = "web";
    protected $fillable = [
        'project_id', 
        'amenity_id',
    ];
}
