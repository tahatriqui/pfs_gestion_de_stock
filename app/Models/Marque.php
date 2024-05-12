<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    public function materiel()
    {
        return $this->hasMany(Materiel::class);
    }
    public $fillable = ['marque'];
}
