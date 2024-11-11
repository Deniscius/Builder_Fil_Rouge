<?php

// app/Models/RessourceQuantite.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RessourceQuantite extends Model
{
    use HasFactory;

    protected $fillable = ['ressource_id', 'date', 'quantite'];

    public function ressource()
    {
        return $this->belongsTo(Ressource::class);
    }
}

