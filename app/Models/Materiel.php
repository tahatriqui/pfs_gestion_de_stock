<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    public function categories(){
      return  $this->belongsTo(Category::class,"categories_id");
    }

    public function etat(){
    return $this->belongsTo(Etat::class, 'etats_id');
    }


    public function user(){
        return  $this->belongsTo(User::class,'users_id');
    }

    public function division(){
       return $this->belongsTo(Division::class,'divisions_id');
    }

    public function service(){
       return $this->belongsTo(Service::class,'services_id');
    }
    public function marque(){
       return $this->belongsTo(Marque::class);
    }
    protected $casts = [
        'la_date' => 'date:Y-m-d',
    ];
    public $fillable =['marque_id',"ref",'services_tag','code_barre',"configue","etats_id","divisions_id","services_id","users_id","categories_id","la_date"];

}
