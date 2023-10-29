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
        Schema::create('excavators', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name');
            $table->string('brand');
            $table->enum('status', ['available','unvailable','repairing'])->default('available');
            $table->string('fuel');
            $table->string('rental_price');
            $table->longText('unit_description');
            $table->string('image');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excavators');
    }
};
