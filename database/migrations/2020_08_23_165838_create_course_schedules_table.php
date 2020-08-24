<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day')->nullable();
            $table->integer('sort_order')->nullable();
            $table->integer('break')->nullable();
            $table->string('class_first')->nullable();
            $table->string('class_second')->nullable();
            $table->string('class_third')->nullable();
            $table->string('class_forth')->nullable();
            $table->string('class_fifth')->nullable();
            $table->string('class_first_time')->nullable();
            $table->string('class_second_time')->nullable();
            $table->string('class_third_time')->nullable();
            $table->string('class_forth_time')->nullable();
            $table->string('class_fifth_time')->nullable();
            $table->enum('day_type', ['even', 'odd']);
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
        Schema::dropIfExists('course_schedules');
    }
}
