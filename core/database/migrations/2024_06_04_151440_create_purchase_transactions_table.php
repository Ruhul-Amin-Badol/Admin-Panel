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
        Schema::create('purchase_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('purchase_number')->notNullable();
            $table->unsignedBigInteger('purchase_id')->notNullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedInteger('method_id')->notNullable();
            $table->string('method_name')->nullable()->comment('bkash, nagad, rocket etc');
            $table->text('transaction_id')->notNullable();
            $table->float('amount')->notNullable();
            $table->tinyInteger('status')->default(0)->comment('0: pending, 1: verified');
            $table->string('verify_by', 256)->nullable();
            $table->text('notes')->nullable();
            $table->tinyInteger('is_posted')->nullable()->comment('for accounts transaction if need');
            $table->unsignedInteger('created_by')->nullable()->comment('auth id');
            $table->timestamps();
            $table->softDeletes();
            // Foreign key constraints
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_transactions');
    }
};
