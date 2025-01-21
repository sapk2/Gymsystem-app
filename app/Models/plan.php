<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;
    protected $fillable=[
        'plan_id',
        'name',
        'description',
        'validity',
        'rate',
        'amount'
    ];
}
