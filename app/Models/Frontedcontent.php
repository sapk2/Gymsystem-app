<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontedcontent extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'tagline',
        'heading',
        'startlink',
        'feature_title',
        'feature_offer',
        'feature_link',
        'hours_week',
        'hours_sat',
        'status',
    ];
}
