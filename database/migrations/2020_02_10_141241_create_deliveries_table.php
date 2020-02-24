<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('senderName')->nullable();
            $table->string('recieverName')->nullable();
            $table->bigInteger('user_id');
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('address')->nullable();
            $table->string('RefNo')->nullable();
            $table->string('description')->nullable();
            $table->string('weight')->nullable();
            $table->string('cost')->nullable();
            $table->string('tellerNumber')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('deliveries');
    }
}
