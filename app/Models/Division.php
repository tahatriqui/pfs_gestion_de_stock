<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    public function materiel(){
        $this->belongsTo(Materiel::class);
    }
    public function user(){
        $this->hasmany(User::class);
    }

    public function service()
    {
        $this->hasMany(Service::class);
    }
    public $fillable = ['name'];
}
