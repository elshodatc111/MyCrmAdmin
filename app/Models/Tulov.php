<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tulov extends Model
{
    use HasFactory;
    protected $fillable = [
        'markaz_id',
        'summa',
        'about'
    ];
}
