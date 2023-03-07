<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutUsContent extends Model
{
    use HasFactory;
    
    protected $table = "about_us_contents";
    protected $connection = "web";
}
