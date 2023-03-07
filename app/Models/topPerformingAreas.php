<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topPerformingAreas extends Model
{
    use HasFactory;
    
    protected $table = "top_performing_areas";
    protected $connection = "web";
}
