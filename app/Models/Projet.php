<?php

// app/Models/Projet.php

// app/Models/Projet.php

// app/Models/Projet.php

// app/Models/Projet.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = ['nomProjet', 'dateDebut', 'dateFin', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
}
