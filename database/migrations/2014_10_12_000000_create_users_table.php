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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            // $table->string('dob')->nullable();
            // $table->string('geoPol')->nullable();
            // $table->integer('soo')->nullable();
            // $table->integer('lgoo')->nullable();
            // $table->string('address')->nullable();
            // $table->string('religion')->nullable();
            // $table->string('tribe')->nullable();
            // $table->string('type')->nullable();
            // $table->string('bank')->nullable();
            // $table->string('accName')->nullable();
            // $table->integer('accNo')->nullable();
            // $table->string('passport')->nullable();
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
