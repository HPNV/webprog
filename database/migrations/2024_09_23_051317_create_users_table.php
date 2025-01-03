<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            DB::connection()->getPdo();
            echo "Database connection is working.";
        } catch (\Exception $e) {
            die("Could not connect to the database. Error: " . $e->getMessage());
        }

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('userId')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password'); // Kolom password
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
