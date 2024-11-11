<?php

// app/Models/Service.php

// app/Models/Service.php

// app/Models/Service.php

// app/Models/Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['nomService', 'description', 'projet_id'];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }
}
