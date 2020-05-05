<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemrequests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userid')->unsigned();
            $table->string('requestedItem');
            $table->date('date');
            $table->string('reason', 256);
            $table->enum('status', ['PENDING', 'APPROVED', 'DENIED'])->default('PENDING');
            $table->string('requester');
            $table->timestamps();
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemrequests');
    }
}
