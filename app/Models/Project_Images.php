<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Images extends Model
{
    use HasFactory;

    protected $table = "project_images";
    protected $connection = "web";
    protected $fillable = [
        'project_id', 
        'image',
    ];
}