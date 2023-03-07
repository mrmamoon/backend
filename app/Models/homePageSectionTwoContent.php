<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homePageSectionTwoContent extends Model
{
    use HasFactory;
    protected $connection = "web";

    protected $table = "home_page_section_two_contents";
}
