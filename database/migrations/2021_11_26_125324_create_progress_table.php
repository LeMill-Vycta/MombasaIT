<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->string('service');
            $table->integer('user_id');
            $table->integer('staff_id');
            $table->string('date_started');
            $table->string('target_date');
            $table->string('date_completed');
            $table->decimal('progress_of_work(%)');
            $table->string('completed_work');
            $table->string('remaining_work');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress');
    }
}
 