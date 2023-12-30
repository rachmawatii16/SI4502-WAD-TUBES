<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
<<<<<<<< HEAD:database/migrations/2023_12_24_171147_add_role.php
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user');
========
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_order')->unique;
            $table->integer('jumlah_amount')->unique();
            $table->string('catatan');
            $table->timestamps();
>>>>>>>> origin/Dita:database/migrations/2023_12_30_143949_create_pemesanan_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2023_12_24_171147_add_role.php
        Schema::table('users', function (Blueprint $table) {
            //
        });
========
        Schema::dropIfExists('pemesanan');
>>>>>>>> origin/Dita:database/migrations/2023_12_30_143949_create_pemesanan_table.php
    }
};
