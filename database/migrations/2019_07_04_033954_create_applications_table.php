<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('marks')->nullable();
            $table->string('certificate');
            $table->smallInteger('status');
            $table->Integer('division_id');
            $table->Integer('teacher_id');
            $table->Integer('student_id');
            $table->Integer('subject_id');
            $table->Integer('test_no');

            $table->text('reason');
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('applications');
    }
}