<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->constrained('accommodation_providers')->onDelete('cascade');
            $table->string('name');
            $table->enum('unit_type', ['Room', 'Apartment', 'Car']);
            $table->integer('capacity')->default(1);
            $table->boolean('is_suite')->default(false);
            $table->decimal('price_per_day', 10, 2);
            $table->enum('status', ['Available', 'Booked', 'Maintenance'])->default('Available');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('units');
    }
}
