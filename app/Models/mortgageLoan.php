<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mortgageLoan extends Model
{
    use HasFactory;
    protected $table = "loan_requests";
    protected $connection = "web";
    protected $fillable = [
        'status',
    ];
}
