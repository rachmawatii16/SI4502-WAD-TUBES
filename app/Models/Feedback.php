<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;



    protected $fillable = ['food_name', 'content', 'order_number'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
