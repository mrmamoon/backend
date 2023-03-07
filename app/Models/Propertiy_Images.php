<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertiy_Images extends Model
{
    use HasFactory;

    protected $table = "property_images";
    protected $connection = "web";
    protected $fillable = [
        'property_id', 
        'image',
    ];
}
}
