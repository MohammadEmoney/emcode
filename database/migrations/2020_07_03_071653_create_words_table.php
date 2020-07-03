<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('day')->default(1);
            $table->boolean('learnt')->default(false);
            $table->string('word');
            $table->string('word_id')->nullable();
            $table->string('uuid')->nullable();
            $table->json('stems')->nullable();
            $table->json('app_shortdef')->nullable();
            $table->boolean('offensive')->default(false);
            $table->string('fl')->nullable();
            $table->json('hwi')->nullable();
            $table->json('ins')->nullable();
            $table->json('def')->nullable();
            $table->json('shortdef')->nullable();
            $table->json('extra')->nullable();
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
        Schema::dropIfExists('words');
    }
}
