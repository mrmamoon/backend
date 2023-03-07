<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insight_tables extends Model
{
    use HasFactory;
        protected $table = "insight_tables";
    protected $connection = "web";
}
