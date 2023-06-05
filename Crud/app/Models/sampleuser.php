<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sampleuser extends Model
{
    use HasFactory;

    protected $table = 'sampleuser';
    protected $fillable = [
        'username', 
        'password'
    ];
}
