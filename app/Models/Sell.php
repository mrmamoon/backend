<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    protected $connection = "web";
    protected $table = "sell";
    protected $fillable = [
        'name',
        'email',
        'number',
        'url', 
        'type', 
        'bedrooms', 
        'area', 
        'unitno', 
        'price', 
        'title_image',
        'passport_image',
        'images',
         ];
}
