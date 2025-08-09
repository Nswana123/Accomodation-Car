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
       Schema::create('unit_type_images', function (Blueprint $table) {
    $table->id();
    $table->foreignId('unit_type_id')->constrained()->onDelete('cascade');
    $table->string('image'); // path to the stored image
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_type_images');
    }
};
