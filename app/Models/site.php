<?php

// app/Models/Site.php

// app/Models/Site.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['nomSite', 'description'];
}
