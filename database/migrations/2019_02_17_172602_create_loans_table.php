<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('loans', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger("book_id");
          $table->string('client');
          $table->date('loaned_on');
          $table->date('estimated_on');
          $table->date('returned_on')->nullable();
          $table->timestamps();

          $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
