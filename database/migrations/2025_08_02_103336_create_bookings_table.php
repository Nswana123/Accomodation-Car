<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('unit_id')->nullable()->constrained('units')->onDelete('set null');
            $table->foreignId('suite_id')->nullable()->constrained('unit_suites')->onDelete('set null');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->string('guests');
             $table->string('booking_no')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['Pending', 'Confirmed', 'Cancelled', 'Checked-In', 'Checked-Out'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
