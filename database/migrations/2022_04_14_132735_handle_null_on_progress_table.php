<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HandleNullOnProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Progress', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->constrained('users')->nullOnDelete()->change();
            $table->integer('staff_id')->nullable()->constrained('users')->nullOnDelete()->change();        
            $table->string('service')->nullable()->constrained('services')->nullOnDelete()->change();        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Progress', function (Blueprint $table) {
            $table->integer('user_id')->change();
            $table->integer('staff_id')->change();
            $table->string('service')->change();
        });
    }
}
