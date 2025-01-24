<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class health extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'blood_group',
        'height',
        'weight',
        'bmi',
        'blood_pressure',
        'heart_rate',
        'body_fat_percentage',
        'notes',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
