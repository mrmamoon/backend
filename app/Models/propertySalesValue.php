<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertySalesValue extends Model
{
    use HasFactory;
    
    protected $table = "property_sales_value";
    protected $connection = "web";
}
