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
        Schema::create('ca_hoc', function (Blueprint $table) {
            $table->tinyIncrements('id_ca_hoc');
            $table->string('ten_ca_hoc', 10);
            $table->boolean('loai_ca_hoc');
            $table->time('thoi_gian_bat_dau', $precision = 0);
            $table->time('thoi_gian_ket_thuc', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ca_hoc');
    }
};
