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
        Schema::create('placesHotels', function (Blueprint $table) {
            $table->uuid('placeId');
            $table->uuid('hotelId');
            $table->timestamps();

            $table->primary(['placeId', 'hotelId']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placesHotels');
    }
};