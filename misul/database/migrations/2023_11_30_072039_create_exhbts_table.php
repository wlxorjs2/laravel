<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exhbts', function (Blueprint $table) {
            $table->id();
			
			$table->string('exhbtbigname', 50)->nullbale();
			$table->string('exhbtname', 50)->nullbale();
			$table->date('exhbtdate')->nullbale();
			$table->string('exhbtex')->nullbale();
			$table->string('jijeom')->nullbale();
			$table->string('exhbtexpic',255)->nullable();
			$table->string('modal',255)->nullable();
			
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhbts');
    }
};
