<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $fillable = ["categorie"];
     public function materiel()
    {
        return $this->belongsTo(Materiel::class);
    }

}
