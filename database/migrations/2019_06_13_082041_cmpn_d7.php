<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmpnD7 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmpn_d7', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Division');
            $table->integer('AM-4 1');
            $table->integer('AOA 1');
            $table->integer('COA 1');
            $table->integer('CG 1');
            $table->integer('OS 1');
            $table->integer('AM-4 2');
            $table->integer('AOA 2');
            $table->integer('COA 2');
            $table->integer('CG 2');
            $table->integer('OS 2');
            $table->integer('AM-4 Avg');
            $table->integer('AOA Avg');
            $table->integer('COA Avg');
            $table->integer('CG Avg');
            $table->integer('OS Avg');
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
        Schema::dropIfExists('cmpn_d7');

    }
}
