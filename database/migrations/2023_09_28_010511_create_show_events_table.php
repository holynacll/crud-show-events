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
        Schema::create('show_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('attractions');
            $table->string('description');
            $table->dateTime('start_datetime');
            $table->string('img_path');
            $table->float('price');
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_events');
    }
};
