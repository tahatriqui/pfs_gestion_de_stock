<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;
    public function user()
    {
        return  $this->belongsTo(User::class, 'user_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function materiel()
    {
        return $this->belongsTo(Materiel::class, 'materiel_id');
    }

    public $fillable =["materiel_id",'services_tag','code_barre',"etat_id","division_id","service_id","user_id"];
}
