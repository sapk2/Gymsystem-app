<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthGoal extends Model
{
     use HasFactory;

    protected $fillable = ['user_id', 'target_weight', 'target_bmi', 'target_body_fat'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
