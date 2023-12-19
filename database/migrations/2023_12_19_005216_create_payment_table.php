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
        Schema::create('payment', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->string('username');
            $table->foreign('username')->references('username')->on('user')->onDelete('cascade');
            $table->string('menu');
            $table->foreign('menu')->references('menu')->on('menu')->onDelete('cascade');
            $table->integer('amount');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
