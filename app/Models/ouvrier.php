<?php

// app/Models/Ouvrier.php

// app/Models/Ouvrier.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrier extends Model
{
    use HasFactory;

    protected $fillable = ['nomOuvrier', 'specialisation', 'service_id', 'projet_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
