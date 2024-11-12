<?php

// app/Models/Ressource.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = ['nomRessource', 'typeRessource', 'quantite', 'service_id', 'projet_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
