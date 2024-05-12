<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['nom',"prenom","cin","email","telephone","divisions_id"];
    public function materiel()
    {
        return $this->belongsTo(Materiel::class);
    }

    public function division()
    {
    return $this->belongsTo(Division::class, 'divisions_id');
    }
}
