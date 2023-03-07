<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyPricePerSqft extends Model
{
    use HasFactory;
    
    protected $table = "property_price_per_sqft";
    protected $connection = "web";
}
