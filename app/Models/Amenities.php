<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    use HasFactory;

    protected $table = "amenities";
    protected $connection = "web";
    protected $fillable = ['parent_id', 'name','icon', 'img', 'description', 'category_url', 'meta_description', 'meta_keywords', 'sort_order',];

}
