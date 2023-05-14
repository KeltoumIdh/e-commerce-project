<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //protège votre application contre les attaques de type mass-assignment (affectation de masse). 
    protected $fillable =[
        'name',
        'slug',
        'description'
        ,'status'
        ,'popular'
        ,'meta_title'
        ,'meta_descrip'
        ,'meta_keyword'
    ];
}
