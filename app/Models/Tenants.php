<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenants extends Model
{
    use HasFactory;
    protected $table = 'tenants';
    protected $primaryKey = 'tenant_id';
    protected $fillable = [
        'foto_tenant',
        'tenant',
        'deskripsi_singkat',
    ];

    // relasi model
    public function menus(){
        return $this->hasMany(Menus::class);
    }
}