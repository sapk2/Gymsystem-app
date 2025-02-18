<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'plan_id',
        'payment_date',
        'amount',
        'payment_method',
        'transaction_id',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function plan()
{
    return $this->belongsTo(plan::class);
}

}
