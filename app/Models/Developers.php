<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developers extends Model
{
    use HasFactory;

    protected $connection = "web";
    protected $table = "developers";
    protected $fillable = ['network_name', 'website','imagesmenu', 'address', 'description', 'email', 'phone', 'featured', 'logo', 'status', ];

}
