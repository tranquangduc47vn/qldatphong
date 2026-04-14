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
        Schema::create('toa_nha', function (Blueprint $table) {
            $table->tinyIncrements('id_toa_nha');
            $table->string('ten_toa_nha', 255);
            $table->unsignedTinyInteger('id_co_so');
            $table->foreign('id_co_so')->references('id_co_so')->on('co_so')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toa_nha');
    }
};
