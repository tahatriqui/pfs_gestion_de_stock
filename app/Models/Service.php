<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function division()
    {
        return $this->belongsTo(Division::class, 'divisions_id');
    }


    public $fillable = ['services',"bureau","divisions_id"];
}

