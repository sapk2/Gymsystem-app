<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'plan_id',
        'city_name',
        'state',
        'gender',
        'dob',
        'phone_no',
        'joining_date',
        'expirydate'
    ];
    public function user(){
        return $this ->belongsTo(User::class);
    }
    public function plan()
{
    return $this->belongsTo(Plan::class);
}

} 
