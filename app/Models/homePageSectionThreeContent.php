<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homePageSectionThreeContent extends Model
{
    use HasFactory;
    protected $connection = "web";
    protected $table = "home_page_section_three_contents";
    
}
