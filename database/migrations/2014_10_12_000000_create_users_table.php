<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->integer('roll_no');
            $table->integer('division');
            $table->unique(array('roll_no','division'));
            $table->string('phone_no',20);
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('parentname1',100);
            $table->string('parentemail1',100);
            $table->string('parentphone_no1',20);
            $table->string('parentname2',100);
            $table->string('parentemail2',100);
            $table->string('parentphone_no2',20);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
