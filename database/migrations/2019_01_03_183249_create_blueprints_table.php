<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlueprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blueprints', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stack_id');
            $table->enum('role', ['frontend', 'database', 'redis', 'worker', '*']);
            $table->timestamps();

            $table->unique(['stack_id', 'role']);

            $table->foreign('stack_id')
                  ->references('id')->on('stacks')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blueprints');
    }
}
