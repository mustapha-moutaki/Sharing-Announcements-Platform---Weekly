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
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'annonce_id');//it's means that one annonce or post has  many coemments
    }
}
