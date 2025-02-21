<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model{
    use HasFactory, SoftDeletes;//that is the function that helpping us to remove or softdelete
    protected $fillable = [
        'name',
    ];
}

