<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyManagementContent extends Model
{
    use HasFactory;
    protected $table = "property_management_contents";
    protected $connection = "web";
}
