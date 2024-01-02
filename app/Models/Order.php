<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'food_name', 'status', 'menu_id', 'food_name', 'price'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function feedback(){
        return $this->hasOne(Feedback::class); //one to one dengan model Feedback
    }
}
