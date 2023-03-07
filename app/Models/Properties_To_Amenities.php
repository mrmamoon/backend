<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties_To_Amenities extends Model
{
    use HasFactory;
     protected $table = "property_to_amenity";
    protected $connection = "web";
    protected $fillable = [
        'property_id', 
        'amenity_id',
    ];
}
