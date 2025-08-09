<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitSuiteItemsTable extends Migration
{
    public function up()
    {
        Schema::create('unit_suite_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('suite_id')->constrained('unit_suites')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unit_suite_items');
    }
}
