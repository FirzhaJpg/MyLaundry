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
        Schema::create('order_status_history', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('changed_by_user_id')->nullable()->constrained('users');

            $table->enum('old_payment_status', ['sudah_bayar', 'belum_bayar'])->nullable();
            $table->enum('new_payment_status', ['sudah_bayar', 'belum_bayar'])->nullable();
            $table->enum('old_laundry_status', ['diproses', 'selesai', 'sudah_diambil'])->nullable();
            $table->enum('new_laundry_status', ['diproses', 'selesai', 'sudah_diambil'])->nullable();

            $table->text('note')->nullable();
            $table->timestamp('changed_at')->useCurrent();

            $table->index(['order_id', 'changed_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_status_history');
    }
};
