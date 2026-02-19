<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quick extends Model
{
    use HasFactory;
    protected $table = 'quicks';
    protected $fillable = [
        'title','quick_image','description',
        
    ];
}
