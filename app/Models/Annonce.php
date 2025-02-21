<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    // use hasFactory;
    protected $table ='annonces';
    protected $fillable = [
        'title', 'description', 'prix', 'image', 'userId', 'categoryId'
    ];
    
}
