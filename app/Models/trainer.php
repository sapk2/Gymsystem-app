<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'specialization',
        'phone_no',
        'end_at'

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
  

}
