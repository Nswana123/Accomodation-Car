<?php

// database/migrations/xxxx_xx_xx_update_units_table_add_unit_type.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUnitsTableAddUnitType extends Migration
{
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_type_id')->nullable()->after('provider_id');
            $table->foreign('unit_type_id')->references('id')->on('unit_types')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropForeign(['unit_type_id']);
            $table->dropColumn('unit_type_id');
        });
    }
}