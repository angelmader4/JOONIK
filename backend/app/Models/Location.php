<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $primaryKey = 'code';

    protected $fillable = [
        'code',
        'name',
        'image',
        'creation_date',
    ];

    protected $casts = [
        'creation_date' => 'date',
    ];
}
