<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'attractions',
        'description',
        'start_date',
        'img_path',
        'price'
    ];

}
