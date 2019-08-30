<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('desc');
            $table->timestamps();
        });

        Schema::create('sub_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('task_id');
            $table->string('name');
            $table->string('desc');
            $table->string('code');
            $table->json('dod');
            $table->integer('count');
            $table->timestamps();
        });

        Schema::create('user_sub_task', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user');
            $table->integer('id_sub_task');
            $table->boolean('is_done');
            $table->string('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('sub_tasks');
        Schema::dropIfExists('user_sub_task');
    }
}
