<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_test', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id');
            $table->integer('subject_id');
            $table->integer('student_id');
            $table->integer('IA1')->default(-1);
            $table->integer('status1')->default(0);
            $table->integer('IA2')->default(-1);
            $table->integer('status2')->default(0);;
            $table->integer('Avg')->default(-1);;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internal_tests');
    }
}
