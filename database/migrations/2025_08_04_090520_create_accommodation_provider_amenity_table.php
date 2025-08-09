<?php

// database/migrations/xxxx_xx_xx_create_accommodation_provider_amenity_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationProviderAmenityTable extends Migration
{
    public function up()
    {
        Schema::create('accommodation_provider_amenity', function (Blueprint $table) {
            $table->foreignId('accommodation_provider_id')->constrained()->onDelete('cascade');
            $table->foreignId('amenity_id')->constrained()->onDelete('cascade');
            $table->primary(['accommodation_provider_id', 'amenity_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('accommodation_provider_amenity');
    }
}

