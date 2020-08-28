<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('lan', ['fa', 'en'])->default('fa');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('languages')->nullable();
            $table->text('socials')->nullable();
            $table->text('about')->nullable();
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
        Schema::dropIfExists('infos');
    }
}
