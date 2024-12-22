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
        Schema::create('hotelRooms', function (Blueprint $table) {
            $table->uuid('hotelId');
            $table->uuid('roomId');
            $table->boolean('available');
            $table->timestamps();

            $table->primary(['hotelId', 'roomId']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotelRooms');
    }
};
