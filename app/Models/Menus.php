<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $primaryKey = 'menu_id';
    protected $fillable = [
        'foto',
        'menu_name',
        'deskripsi',
        'amount',
    ];
    public function tenants(){
        return $this->belongsTo(Tenants::class);
    }
}