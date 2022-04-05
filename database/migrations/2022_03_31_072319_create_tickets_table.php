<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->string('job')->nullable();
            $table->string('job_no')->nullable();
            $table->integer('brand')->unsigned()->index()->nullable();
            $table->integer('country')->unsigned()->index()->nullable();
            $table->integer('category')->unsigned()->index()->nullable();
            $table->integer('priority')->unsigned()->index()->nullable();
            $table->dateTime('deadline')->nullable()->default(now());
            $table->integer('status')->unsigned()->index()->nullable();
            $table->string('title')->nullable();
            $table->string('summary')->nullable();
            $table->string('objective')->nullable();
            $table->string('reference')->nullable();
            $table->string('otherinfo')->nullable();
            $table->integer('commentnos')->default(0)->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
