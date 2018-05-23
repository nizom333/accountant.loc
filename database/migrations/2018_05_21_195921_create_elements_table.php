<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
			$table->increments('ID');
            $table->integer('CATEGORY_ID')->nullable();
            $table->integer('USER_ID')->nullable();
            $table->string('DATE')->nullable();
            $table->string('EXPENSE')->nullable();
            $table->string('PRICE')->nullable();
            $table->string('COMMENTS')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elements');
    }
}
