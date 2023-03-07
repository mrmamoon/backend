<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $connection = "web";
    protected $table = "new_projects";
    protected $fillable = [
        'developer_id',
        'title',
        'bedrooms',
        'bathrooms', 
        'type', 
        'area', 
        'guests', 
        'phone', 
        'email', 
        'url',
        'images',
        'featured_image',
        'price',
        'conditions',
        'description',
        'website',
        'tags',
        'seo_title',
        'meta_description',
        'meta_keywords',
        'featured',
        'status',
        'garage',
        'published'
         ];
}
