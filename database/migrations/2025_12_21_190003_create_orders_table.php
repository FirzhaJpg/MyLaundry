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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users');

            $table->string('customer_name', 150);
            $table->string('customer_phone', 30);

            $table->string('service_type', 100);
            $table->decimal('quantity', 10, 2);
            $table->decimal('price', 12, 2);

            $table->timestamp('order_date')->useCurrent();

            $table->enum('payment_status', ['sudah_bayar', 'belum_bayar'])->default('belum_bayar');
            $table->enum('laundry_status', ['diproses', 'selesai', 'sudah_diambil'])->default('diproses');

            $table->timestamps();

            $table->index(['user_id', 'order_date']);
            $table->index('order_date');
            $table->index('payment_status');
            $table->index('laundry_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
