<?php

// app/Models/Projet.php

// app/Models/Projet.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = ['nomProjet', 'dateDebut', 'dateFin'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}

