<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelacakan extends Model
{
    use HasFactory;
    protected $table = 'Pelacakan';
    protected $fillable = [
        'status_proses',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
