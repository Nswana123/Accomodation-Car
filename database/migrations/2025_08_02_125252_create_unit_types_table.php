<?php

// database/migrations/xxxx_xx_xx_create_unit_types_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitTypesTable extends Migration
{
    public function up()
    {
        Schema::create('unit_types', function (Blueprint $table) {
            $table->id();
             $table->foreignId('provider_id')->constrained('accommodation_providers')->onDelete('cascade');
            $table->string('name'); // e.g. Deluxe Room, Sedan Car, 2-Bedroom Apartment
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unit_types');
    }
}
