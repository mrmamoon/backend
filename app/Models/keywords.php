<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keywords extends Model
{
    use HasFactory;
    protected $table = "keywords";
    protected $connection = "web";
}
