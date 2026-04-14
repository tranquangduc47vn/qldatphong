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
        Schema::create('tang', function (Blueprint $table) {
            $table->tinyIncrements('id_tang');
            $table->string('ten_tang', 10);
            $table->unsignedTinyInteger('id_toa_nha');
            // $table->foreign('id_toa_nha')->references('id_toa_nha')->on('toa_nha')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tang');
    }
};
