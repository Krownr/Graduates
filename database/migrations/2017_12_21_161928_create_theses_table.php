<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->nullable()->default(null);
            $table->integer('supervisor_id')->unsigned()->nullable()->default(null);
            $table->string('topic', 50);
            $table->decimal('mark')->unsigned()->nullable()->default(null);
            $table->dateTime('presentation_date');
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('supervisor_id')->references('id')->on('supervisors');
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theses');
    }
}
