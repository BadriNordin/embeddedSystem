<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('finalProjectDB', function (Blueprint $table) {
            $table->uuid('uuid');
            $table->timestamp('timestamp');
            $table->string('visitor');
            $table->string('password');
            $table->primary('uuid');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finalProjectDB');
    }
};
