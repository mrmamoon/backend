<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homeCarousel extends Model
{
    use HasFactory;
    protected $connection = "web";
    protected $table = "home_carousels";
}
