<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class DivisionTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_teacher', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id');
            $table->integer('subject_id')->nullable();
            $table->integer('teacher_id');
            $table->dateTime('Expiry_1');
            $table->dateTime('Expiry_2');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('division_teacher');
    }
}