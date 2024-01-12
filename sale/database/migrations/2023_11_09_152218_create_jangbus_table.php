<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jangbus', function (Blueprint $table) {
            $table->id();
            $table->tinyinteger('io32')->nullable();
            $table->date('writeday32')->nullable();
            $table->integer('products_id32')->nullable();
            $table->integer('price32')->nullable();
            $table->integer('numi32')->nullable();
            $table->integer('numo32')->nullable();
            $table->integer('prices32')->nullable();
            $table->string('bigo32',20)->nullable();
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
        Schema::dropIfExists('jangbus');
    }
};
