<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitSuitesTable extends Migration
{
    public function up()
    {
        Schema::create('unit_suites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('provider_id')->constrained('accommodation_providers')->onDelete('cascade');
            $table->decimal('total_price_per_day', 10, 2);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unit_suites');
    }
}
