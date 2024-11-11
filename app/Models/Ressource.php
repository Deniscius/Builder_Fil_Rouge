<?php

// app/Models/Ressource.php

// app/Models/Ressource.php

// app/Models/Ressource.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = ['nomRessource', 'description', 'projet_id', 'quantite_initiale'];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function quantites()
    {
        return $this->hasMany(RessourceQuantite::class);
    }
}
