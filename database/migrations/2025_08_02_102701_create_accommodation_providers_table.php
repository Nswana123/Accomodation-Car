<?php
// database/migrations/xxxx_xx_xx_create_accommodation_providers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationProvidersTable extends Migration
{
    public function up()
    {
        Schema::create('accommodation_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['Hotel', 'Apartment', 'Boarding House', 'Car Hire']);
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accommodation_providers');
    }
}
