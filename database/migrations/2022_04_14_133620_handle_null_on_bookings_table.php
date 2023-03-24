<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HandleNullOnBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Bookings', function (Blueprint $table) {
            $table->integer('services_id')->nullable()->constrained('services')->nullOnDelete()->change();
            $table->integer('user_id')->nullable()->constrained('users')->nullOnDelete()->change();        
            $table->integer('staff_id')->nullable()->constrained('users')->nullOnDelete()->change();        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Bookings', function (Blueprint $table) {
            $table->integer('user_id')->change();
            $table->integer('staff_id')->change();
            $table->integer('services_id')->change();        
        });
    }
}
