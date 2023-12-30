<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'tanggal_pembayaran',
        'jumlah_amount',
        'metode_pembayaran',
        'status_pembayaran',
    ];
}
