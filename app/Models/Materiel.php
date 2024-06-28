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

    public function materiel(){
    return $this->hasMany(Materiel::class);
    }

    public function marque(){
       return $this->belongsTo(Marque::class);
    }
    protected $casts = [
        'la_date' => 'date:Y-m-d',
    ];
    public $fillable =['marque_id',"ref","configue","etats_id","categories_id","la_date","quant"];

}
