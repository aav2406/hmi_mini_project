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
        Schema::create('internal_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id');
            $table->integer('roll_no');
            $table->integer('subject_id');
            $table->integer('ia1');
            $table->integer('ia2');
            $table->integer('status1');
            $table->integer('status2');
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
