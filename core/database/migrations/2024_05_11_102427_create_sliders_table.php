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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('image')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->nullable();
            $table->unsignedBigInteger('created_by')->nullable()->comment('Auth id');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('Auth id');
            $table->unsignedBigInteger('deleted_by')->nullable()->comment('Auth id');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};